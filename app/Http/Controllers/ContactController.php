<?php

namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = MessageWhatsapp::query();

        if ($request->filled('campagne')) {
            $query->where('nom_campagne', $request->campagne);
        }

        if ($request->filled('search')) {
            $query->where('numero_telephone', 'like', '%' . $request->search . '%');
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(20);
        $total = MessageWhatsapp::count();
        $campagnes = MessageWhatsapp::distinct()->pluck('nom_campagne');

        return view('contacts.index', compact(
            'messages',
            'total',
            'campagnes'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_telephone' => 'required|string|max:20',
            'nom_campagne' => 'required|string|max:255',
            'date_envoi' => 'nullable|date',
            'id_twilio' => 'nullable|string|max:255'
        ]);

        // Formater le numéro de téléphone avec l'indicatif +225 si absent
        $validated['numero_telephone'] = $this->formatPhoneNumber($validated['numero_telephone']);

        MessageWhatsapp::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240'
        ]);

        $file = $request->file('csv_file');
        $csvData = array_map('str_getcsv', file($file));
        $headers = array_shift($csvData);

        $imported = 0;
        $errors = [];

        foreach ($csvData as $index => $row) {
            if (count($row) >= 2) {
                try {
                    // Formater le numéro de téléphone avec l'indicatif +225 si absent
                    $numeroTelephone = $this->formatPhoneNumber(trim($row[0]));

                    MessageWhatsapp::create([
                        'numero_telephone' => $numeroTelephone,
                        'nom_campagne' => trim($row[1]),
                    ]);
                    $imported++;
                } catch (\Exception $e) {
                    $errors[] = "Ligne " . ($index + 2) . ": " . $e->getMessage();
                }
            }
        }

        $message = "$imported contacts importés avec succès!";
        if (count($errors) > 0) {
            $message .= " (" . count($errors) . " erreurs)";
        }

        return redirect()->route('contacts.index')->with('success', $message);
    }

    public function destroy($id)
    {
        $message = MessageWhatsapp::findOrFail($id);
        $message->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès!');
    }

    public function deleteCampaign(Request $request)
    {
        $validated = $request->validate([
            'campagne' => 'required|string'
        ]);

        $count = MessageWhatsapp::where('nom_campagne', $validated['campagne'])->count();
        MessageWhatsapp::where('nom_campagne', $validated['campagne'])->delete();

        return redirect()->route('contacts.index')->with('success', "Campagne supprimée : {$count} contacts supprimés!");
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = MessageWhatsapp::where('numero_telephone', 'like', "%{$query}%")
            ->orWhere('nom_campagne', 'like', "%{$query}%")
            ->limit(10)
            ->get()
            ->map(function($contact) {
                return [
                    'value' => $contact->numero_telephone . ' - ' . $contact->nom_campagne,
                    'numero' => $contact->numero_telephone,
                    'campagne' => $contact->nom_campagne,
                    'id' => $contact->id
                ];
            });

        return response()->json($results);
    }

    /**
     * Formate le numéro de téléphone en ajoutant l'indicatif +225 si absent
     *
     * @param string $phoneNumber
     * @return string
     */
    private function formatPhoneNumber($phoneNumber)
    {
        // Nettoyer le numéro (supprimer les espaces, tirets, etc.)
        $cleanedNumber = preg_replace('/\s+|-|\(|\)/', '', $phoneNumber);

        // Vérifier si le numéro commence déjà par un indicatif international
        if (preg_match('/^\+(\d+)/', $cleanedNumber)) {
            // Le numéro a déjà un indicatif international, on le retourne tel quel
            return $cleanedNumber;
        }

        // Vérifier si le numéro commence par 225 (sans le +)
        if (preg_match('/^225(\d+)/', $cleanedNumber)) {
            // Ajouter le + devant 225
            return '+' . $cleanedNumber;
        }

        // Si le numéro commence par 0 (format local)
        if (preg_match('/^0(\d+)/', $cleanedNumber)) {
            // Remplacer le 0 initial par +225
            return '+225' . substr($cleanedNumber, 1);
        }

        // Pour tous les autres cas, on ajoute +225 par défaut
        // (numéros sans indicatif et sans 0 initial)
        return '+225' . $cleanedNumber;
    }
}
