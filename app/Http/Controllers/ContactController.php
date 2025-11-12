<?php
namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

        if ($request->has('campagne') && $request->campagne != '') {
            $query->where('nom_campagne', $request->campagne);
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(20);

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

        $phoneNumber = $this->formatPhoneNumber($validated['numero_telephone']);

        if (! $this->isValidPhoneNumber($phoneNumber)) {
            return redirect()->route('contacts.index')
                ->with('error', 'Numéro de téléphone invalide. Formats acceptés: 07 01 23 45 67, +225 07 01 23 45 67, +33612345678, +212612345678');
        }

        $existingContact = MessageWhatsapp::where('numero_telephone', $phoneNumber)
            ->where('nom_campagne', $validated['nom_campagne'])
            ->first();

        if ($existingContact) {
            return redirect()->route('contacts.index')
                ->with('error', 'Ce numéro existe déjà dans cette campagne.');
        }

        try {
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
     * Import contacts from CSV file avec progression en temps réel.
     */
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        try {
            $file    = $request->file('csv_file');
            $csvData = array_map('str_getcsv', file($file));

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

            $total = count($csvData);

            // Générer un ID unique pour cette opération
            $operationId = 'import_' . uniqid();

            // Initialiser la progression dans le cache
            Cache::put($operationId, [
                'total' => $total,
                'processed' => 0,
                'imported' => 0,
                'errors' => 0,
                'duplicates' => 0,
                'status' => 'processing',
                'message' => 'Démarrage de l\'import...'
            ], 600); // 10 minutes

            $imported   = 0;
            $errors     = [];
            $duplicates = 0;
            $processed  = 0;

            foreach ($csvData as $index => $row) {
                $processed++;

                if (count($row) >= 2) {
                    $numero   = trim($row[0]);
                    $campagne = trim($row[1]);

                    if (empty($numero) || empty($campagne)) {
                        $errors[] = "Ligne " . ($index + 1) . ": Données manquantes";

                        // Mettre à jour la progression
                        Cache::put($operationId, [
                            'total' => $total,
                            'processed' => $processed,
                            'imported' => $imported,
                            'errors' => count($errors),
                            'duplicates' => $duplicates,
                            'status' => 'processing',
                            'message' => "Traitement du contact $processed/$total..."
                        ], 600);

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

                // Mettre à jour la progression après chaque contact
                Cache::put($operationId, [
                    'total' => $total,
                    'processed' => $processed,
                    'imported' => $imported,
                    'errors' => count($errors),
                    'duplicates' => $duplicates,
                    'status' => 'processing',
                    'message' => "Traitement du contact $processed/$total..."
                ], 600);

                // Petit délai pour éviter de surcharger
                usleep(10000); // 0.01 seconde
            }

            // Marquer comme terminé
            Cache::put($operationId, [
                'total' => $total,
                'processed' => $processed,
                'imported' => $imported,
                'errors' => count($errors),
                'duplicates' => $duplicates,
                'status' => 'completed',
                'message' => 'Import terminé avec succès!'
            ], 600);

            $message = "$imported contacts importés avec succès.";
            if ($duplicates > 0) {
                $message .= " $duplicates doublons ignorés.";
            }
            if (! empty($errors)) {
                $message .= " " . count($errors) . " erreurs.";
            }

            return response()->json([
                'success'     => true,
                'message'     => $message,
                'imported'    => $imported,
                'errors'      => count($errors),
                'duplicates'  => $duplicates,
                'total'       => $total,
                'processed'   => $processed,
                'operation_id' => $operationId,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'import: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Récupère la progression d'une opération d'import
     */
    public function getImportProgress($operationId)
    {
        $progress = Cache::get($operationId);

        if (!$progress) {
            return response()->json([
                'success' => false,
                'message' => 'Opération non trouvée'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'progress' => $progress
        ]);
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

    // Toutes les autres méthodes privées restent inchangées...
    private function formatPhoneNumber($phoneNumber)
    {
        try {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $numberProto = $phoneUtil->parse($phoneNumber, null);
            if ($phoneUtil->isValidNumber($numberProto)) {
                return $phoneUtil->format($numberProto, PhoneNumberFormat::E164);
            }
        } catch (NumberParseException $e) {
            // Fallback
        }
        return $this->formatPhoneNumberFallback($phoneNumber);
    }

    private function formatPhoneNumberFallback($phoneNumber)
    {
        $cleaned = preg_replace('/[^0-9+]/', '', $phoneNumber);
        if (str_starts_with($cleaned, '+')) {
            return $cleaned;
        }
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+225' . $cleaned;
        }
        if (strlen($cleaned) === 9) {
            return '+2250' . $cleaned;
        }
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+33' . substr($cleaned, 1);
        }
        if (strlen($cleaned) === 9 && !str_starts_with($cleaned, '0')) {
            return '+33' . $cleaned;
        }
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+212' . substr($cleaned, 1);
        }
        if (strlen($cleaned) === 9 && !str_starts_with($cleaned, '0')) {
            return '+212' . $cleaned;
        }
        if (!str_starts_with($cleaned, '+') && strlen($cleaned) >= 10) {
            return '+' . $cleaned;
        }
        return $phoneNumber;
    }

    private function isValidPhoneNumber($phoneNumber)
    {
        try {
            $phoneUtil = PhoneNumberUtil::getInstance();
            $numberProto = $phoneUtil->parse($phoneNumber, null);
            return $phoneUtil->isValidNumber($numberProto);
        } catch (NumberParseException $e) {
            return $this->isValidPhoneNumberFallback($phoneNumber);
        }
    }

    private function isValidPhoneNumberFallback($phoneNumber)
    {
        $pattern = '/^\+\d{1,4}\d{6,14}$/';
        if (preg_match($pattern, $phoneNumber) !== 1) {
            return false;
        }
        $countryChecks = [
            '/^\+2250[1-9]\d{7}$/' => 'Côte d\'Ivoire',
            '/^\+33[1-9]\d{8}$/' => 'France',
            '/^\+212[1-9]\d{8}$/' => 'Maroc',
            '/^\+32[1-9]\d{8}$/' => 'Belgique',
            '/^\+41[1-9]\d{8}$/' => 'Suisse',
            '/^\+221[1-9]\d{8}$/' => 'Sénégal',
            '/^\+237[1-9]\d{7}$/' => 'Cameroun',
            '/^\+\d{1,4}[1-9]\d{5,13}$/' => 'Générique'
        ];
        foreach ($countryChecks as $pattern => $country) {
            if (preg_match($pattern, $phoneNumber) === 1) {
                return true;
            }
        }
        return false;
    }
}
