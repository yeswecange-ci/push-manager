<?php
namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use Illuminate\Http\Request;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
        $query = MessageWhatsapp::query();

        // Filtrage par campagne
        if ($request->has('campagne') && $request->campagne != '') {
            $query->where('nom_campagne', $request->campagne);
        }

        // Récupérer les messages avec pagination
        $messages = $query->orderBy('created_at', 'desc')->paginate(20);

        // Récupérer la liste des campagnes distinctes pour le filtre
        $campagnes = MessageWhatsapp::distinct()
            ->whereNotNull('nom_campagne')
            ->where('nom_campagne', '!=', '')
            ->pluck('nom_campagne')
            ->sort()
            ->values();

        return view('contacts.index', compact('messages', 'campagnes'));
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_telephone' => 'required|string',
            'nom_campagne'     => 'required|string',
        ]);

        // Formater le numéro de téléphone CORRECTEMENT
        $phoneNumber = $this->formatPhoneNumber($validated['numero_telephone']);

        // Vérifier que le format est valide
        if (! $this->isValidPhoneNumber($phoneNumber)) {
            return redirect()->route('contacts.index')
                ->with('error', 'Numéro de téléphone invalide. Formats acceptés: 07 01 23 45 67, +225 07 01 23 45 67, +33612345678, +212612345678');
        }

        // Vérifier si le numéro existe déjà dans cette campagne
        $existingContact = MessageWhatsapp::where('numero_telephone', $phoneNumber)
            ->where('nom_campagne', $validated['nom_campagne'])
            ->first();

        if ($existingContact) {
            return redirect()->route('contacts.index')
                ->with('error', 'Ce numéro existe déjà dans cette campagne.');
        }

        try {
            // Créer le contact avec le numéro formaté
            MessageWhatsapp::create([
                'numero_telephone' => $phoneNumber,
                'nom_campagne'     => $validated['nom_campagne'],
            ]);

            return redirect()->route('contacts.index')
                ->with('success', 'Contact ajouté avec succès');

        } catch (\Exception $e) {
            return redirect()->route('contacts.index')
                ->with('error', 'Erreur lors de l\'ajout du contact: ' . $e->getMessage());
        }
    }

    /**
     * Import contacts from CSV file.
     */
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        try {
            $file    = $request->file('csv_file');
            $csvData = array_map('str_getcsv', file($file));

            $imported   = 0;
            $errors     = [];
            $duplicates = 0;

            // Supprimer l'en-tête si présent
            if (count($csvData) > 0) {
                $header    = $csvData[0];
                $hasHeader = false;

                foreach ($header as $cell) {
                    if (str_contains(strtolower($cell), 'numero') || str_contains(strtolower($cell), 'campagne')) {
                        $hasHeader = true;
                        break;
                    }
                }

                if ($hasHeader) {
                    array_shift($csvData);
                }
            }

            $total     = count($csvData);
            $processed = 0;

            foreach ($csvData as $index => $row) {
                $processed++;

                if (count($row) >= 2) {
                    $numero   = trim($row[0]);
                    $campagne = trim($row[1]);

                    if (empty($numero) || empty($campagne)) {
                        $errors[] = "Ligne " . ($index + 1) . ": Données manquantes";
                        continue;
                    }

                    $formattedNumero = $this->formatPhoneNumber($numero);

                    if ($this->isValidPhoneNumber($formattedNumero) && ! empty($campagne)) {
                        $exists = MessageWhatsapp::where('numero_telephone', $formattedNumero)
                            ->where('nom_campagne', $campagne)
                            ->exists();

                        if (! $exists) {
                            MessageWhatsapp::create([
                                'numero_telephone' => $formattedNumero,
                                'nom_campagne'     => $campagne,
                            ]);
                            $imported++;
                        } else {
                            $duplicates++;
                            $errors[] = "Ligne " . ($index + 1) . ": Doublon - $numero dans $campagne";
                        }
                    } else {
                        $errors[] = "Ligne " . ($index + 1) . ": Format invalide - $numero";
                    }
                } else {
                    $errors[] = "Ligne " . ($index + 1) . ": Format de ligne invalide";
                }
            }

            $message = "$imported contacts importés avec succès.";
            if ($duplicates > 0) {
                $message .= " $duplicates doublons ignorés.";
            }
            if (! empty($errors)) {
                $message .= " " . count($errors) . " erreurs.";
            }

            return response()->json([
                'success'    => true,
                'message'    => $message,
                'imported'   => $imported,
                'errors'     => count($errors),
                'duplicates' => $duplicates,
                'total'      => $total,
                'processed'  => $processed,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'import: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        try {
            $contact = MessageWhatsapp::findOrFail($id);
            $contact->delete();

            return redirect()->route('contacts.index')
                ->with('success', 'Contact supprimé avec succès');

        } catch (\Exception $e) {
            return redirect()->route('contacts.index')
                ->with('error', 'Erreur lors de la suppression du contact: ' . $e->getMessage());
        }
    }

    /**
     * Delete all contacts from a specific campaign.
     */
    public function deleteCampaign(Request $request)
    {
        $request->validate([
            'campagne' => 'required|string',
        ]);

        try {
            $count = MessageWhatsapp::where('nom_campagne', $request->campagne)->count();

            if ($count === 0) {
                return redirect()->route('contacts.index')
                    ->with('error', 'Aucun contact trouvé pour cette campagne.');
            }

            MessageWhatsapp::where('nom_campagne', $request->campagne)->delete();

            return redirect()->route('contacts.index')
                ->with('success', "Campagne '{$request->campagne}' supprimée avec succès ($count contacts supprimés)");

        } catch (\Exception $e) {
            return redirect()->route('contacts.index')
                ->with('error', 'Erreur lors de la suppression de la campagne: ' . $e->getMessage());
        }
    }

    /**
     * Formate le numéro de téléphone correctement avec support international
     */
    private function formatPhoneNumber($phoneNumber)
    {
        try {
            $phoneUtil = PhoneNumberUtil::getInstance();

            // Essayer de parser le numéro
            $numberProto = $phoneUtil->parse($phoneNumber, null);

            // Vérifier si le numéro est valide
            if ($phoneUtil->isValidNumber($numberProto)) {
                // Retourner au format E.164 international
                return $phoneUtil->format($numberProto, PhoneNumberFormat::E164);
            }
        } catch (NumberParseException $e) {
            // En cas d'erreur de parsing, essayer notre méthode de fallback
        }

        // Fallback pour les numéros qui ne peuvent pas être parsés par libphonenumber
        return $this->formatPhoneNumberFallback($phoneNumber);
    }

    /**
     * Méthode de fallback pour formater les numéros manuellement
     */
    private function formatPhoneNumberFallback($phoneNumber)
    {
        // Supprimer tous les caractères non numériques sauf le +
        $cleaned = preg_replace('/[^0-9+]/', '', $phoneNumber);

        // Si le numéro commence par +, le retourner tel quel (déjà au format international)
        if (str_starts_with($cleaned, '+')) {
            return $cleaned;
        }

        // Gestion spécifique pour la Côte d'Ivoire
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+225' . $cleaned; // Garde le 0! Résultat: +2250701234567
        }

        if (strlen($cleaned) === 9) {
            return '+2250' . $cleaned; // Ajoute le 0! Résultat: +2250701234567
        }

        // Gestion pour la France
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+33' . substr($cleaned, 1); // +33612345678
        }

        if (strlen($cleaned) === 9 && !str_starts_with($cleaned, '0')) {
            return '+33' . $cleaned; // +33612345678
        }

        // Gestion pour le Maroc
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+212' . substr($cleaned, 1); // +212612345678
        }

        if (strlen($cleaned) === 9 && !str_starts_with($cleaned, '0')) {
            return '+212' . $cleaned; // +212612345678
        }

        // Pour les autres cas, essayer d'ajouter le + s'il manque
        if (!str_starts_with($cleaned, '+') && strlen($cleaned) >= 10) {
            return '+' . $cleaned;
        }

        // Retourner le numéro original si on ne peut pas le formater
        return $phoneNumber;
    }

    /**
     * Valide le format du numéro de téléphone avec support international
     */
    private function isValidPhoneNumber($phoneNumber)
    {
        try {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $numberProto = $phoneUtil->parse($phoneNumber, null);
            return $phoneUtil->isValidNumber($numberProto);
        } catch (NumberParseException $e) {
            // Fallback vers la validation regex pour les cas simples
            return $this->isValidPhoneNumberFallback($phoneNumber);
        }
    }

    /**
     * Validation fallback avec regex pour les numéros internationaux
     */
    private function isValidPhoneNumberFallback($phoneNumber)
    {
        // Regex pour valider les formats internationaux E.164
        // +2250701234567, +33612345678, +212612345678, etc.
        $pattern = '/^\+\d{1,4}\d{6,14}$/';

        // Vérifier le format de base
        if (preg_match($pattern, $phoneNumber) !== 1) {
            return false;
        }

        // Vérifications spécifiques par pays
        $countryChecks = [
            // Côte d'Ivoire: +225 suivi de 10 chiffres (avec le 0)
            '/^\+2250[1-9]\d{7}$/' => 'Côte d\'Ivoire',

            // France: +33 suivi de 9 chiffres (sans le 0)
            '/^\+33[1-9]\d{8}$/' => 'France',

            // Maroc: +212 suivi de 9 chiffres (sans le 0)
            '/^\+212[1-9]\d{8}$/' => 'Maroc',

            // Belgique: +32 suivi de 9 chiffres
            '/^\+32[1-9]\d{8}$/' => 'Belgique',

            // Suisse: +41 suivi de 9 chiffres
            '/^\+41[1-9]\d{8}$/' => 'Suisse',

            // Sénégal: +221 suivi de 9 chiffres
            '/^\+221[1-9]\d{8}$/' => 'Sénégal',

            // Cameroun: +237 suivi de 8 chiffres
            '/^\+237[1-9]\d{7}$/' => 'Cameroun',

            // Format générique pour la plupart des pays
            '/^\+\d{1,4}[1-9]\d{5,13}$/' => 'Générique'
        ];

        foreach ($countryChecks as $pattern => $country) {
            if (preg_match($pattern, $phoneNumber) === 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get campaign statistics for dashboard
     */
    public function getCampaignStats()
    {
        $stats = MessageWhatsapp::select('nom_campagne')
            ->selectRaw('COUNT(*) as total_contacts')
            ->selectRaw('SUM(CASE WHEN id_twilio IS NOT NULL THEN 1 ELSE 0 END) as sent_messages')
            ->groupBy('nom_campagne')
            ->get();

        return $stats;
    }

    /**
     * Get recent contacts for dashboard
     */
    public function getRecentContacts($limit = 10)
    {
        return MessageWhatsapp::with('campagne')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Détecte le pays d'un numéro de téléphone
     */
    public function detectCountry($phoneNumber)
    {
        try {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $numberProto = $phoneUtil->parse($phoneNumber, null);

            if ($phoneUtil->isValidNumber($numberProto)) {
                $regionCode = $phoneUtil->getRegionCodeForNumber($numberProto);
                return $regionCode ?: 'INCONNU';
            }
        } catch (NumberParseException $e) {
            // Ne rien faire
        }

        return 'INCONNU';
    }
}
