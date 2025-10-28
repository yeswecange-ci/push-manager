<?php

namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nom_campagne' => 'required|string',
        ]);

        // Formater le numéro de téléphone CORRECTEMENT
        $phoneNumber = $this->formatPhoneNumber($validated['numero_telephone']);

        // Vérifier que le format est valide
        if (!$this->isValidPhoneNumber($phoneNumber)) {
            return redirect()->route('contacts.index')
                ->with('error', 'Numéro de téléphone invalide. Format attendu: 07 01 23 45 67 ou +225 07 01 23 45 67');
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
                'nom_campagne' => $validated['nom_campagne'],
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
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            $file = $request->file('csv_file');
            $csvData = array_map('str_getcsv', file($file));

            $imported = 0;
            $errors = [];

            // Supprimer l'en-tête si présent
            if (count($csvData) > 0) {
                $header = $csvData[0];
                $hasHeader = false;

                // Vérifier si la première ligne contient des en-têtes
                foreach ($header as $cell) {
                    if (str_contains(strtolower($cell), 'numero') || str_contains(strtolower($cell), 'campagne')) {
                        $hasHeader = true;
                        break;
                    }
                }

                if ($hasHeader) {
                    array_shift($csvData); // Supprimer l'en-tête
                }
            }

            foreach ($csvData as $index => $row) {
                if (count($row) >= 2) {
                    $numero = trim($row[0]);
                    $campagne = trim($row[1]);

                    // Ignorer les lignes vides
                    if (empty($numero) || empty($campagne)) {
                        continue;
                    }

                    // Formater le numéro
                    $formattedNumero = $this->formatPhoneNumber($numero);

                    if ($this->isValidPhoneNumber($formattedNumero) && !empty($campagne)) {
                        // Vérifier si le contact existe déjà
                        $exists = MessageWhatsapp::where('numero_telephone', $formattedNumero)
                            ->where('nom_campagne', $campagne)
                            ->exists();

                        if (!$exists) {
                            MessageWhatsapp::create([
                                'numero_telephone' => $formattedNumero,
                                'nom_campagne' => $campagne,
                            ]);
                            $imported++;
                        } else {
                            $errors[] = "Ligne " . ($index + 1) . ": Le contact $numero existe déjà dans la campagne $campagne";
                        }
                    } else {
                        $errors[] = "Ligne " . ($index + 1) . ": Format invalide - $numero -> $campagne";
                    }
                } else {
                    $errors[] = "Ligne " . ($index + 1) . ": Format de ligne invalide";
                }
            }

            $message = "$imported contacts importés avec succès.";
            if (!empty($errors)) {
                if (count($errors) > 10) {
                    $message .= " " . count($errors) . " erreurs (affichage limité aux 10 premières).";
                    $errors = array_slice($errors, 0, 10);
                } else {
                    $message .= " " . count($errors) . " erreurs.";
                }

                // Stocker les erreurs détaillées en session
                session(['import_errors' => $errors]);
            }

            return redirect()->route('contacts.index')->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('contacts.index')
                ->with('error', 'Erreur lors de l\'import: ' . $e->getMessage());
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
            'campagne' => 'required|string'
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
     * Formate le numéro de téléphone correctement
     * Ne supprime PAS le premier zéro
     */
    private function formatPhoneNumber($phoneNumber)
    {
        // Supprimer tous les caractères non numériques
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);

        // Si le numéro commence déjà par 225 (sans le +) et a 12 chiffres
        if (strlen($cleaned) === 12 && substr($cleaned, 0, 3) === '225') {
            return '+' . $cleaned;
        }

        // Si le numéro a 10 chiffres et commence par 0 (format local: 07 01 23 45 67)
        if (strlen($cleaned) === 10 && substr($cleaned, 0, 1) === '0') {
            return '+225' . $cleaned; // Garde le 0! Résultat: +2250701234567
        }

        // Si le numéro a 9 chiffres (sans le 0 initial)
        if (strlen($cleaned) === 9) {
            return '+2250' . $cleaned; // Ajoute le 0! Résultat: +2250701234567
        }

        // Si le numéro a 13 chiffres et commence par +225
        if (strlen($cleaned) === 13 && substr($cleaned, 0, 4) === '2250') {
            return '+' . $cleaned;
        }

        // Si le numéro est déjà au format international complet
        if (strlen($cleaned) > 13 && substr($cleaned, 0, 4) === '2250') {
            return '+' . $cleaned;
        }

        // Pour tous les autres cas, on retourne le numéro original
        // Le système essaiera de le traiter tel quel
        return $phoneNumber;
    }

    /**
     * Valide le format du numéro de téléphone
     */
    private function isValidPhoneNumber($phoneNumber)
    {
        // Regex pour valider les formats:
        // +2250701234567 (13 chiffres avec indicatif et 0)
        // +225701234567 (12 chiffres avec indicatif mais sans le 0 - moins courant)
        $pattern = '/^\+225(0)?[1-9]\d{7,8}$/';

        return preg_match($pattern, $phoneNumber) === 1;
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
}
