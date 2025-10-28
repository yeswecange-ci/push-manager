<?php

namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total = MessageWhatsapp::count();
        $campagnes = MessageWhatsapp::distinct()->pluck('nom_campagne');

        // Nouvelles statistiques dynamiques
        $todayMessages = MessageWhatsapp::whereDate('created_at', today())->count();

        // Calcul du taux de réussite (messages envoyés / total messages)
        $totalSent = MessageWhatsapp::whereNotNull('date_envoi')->count();
        $successRate = $total > 0 ? round(($totalSent / $total) * 100, 1) : 0;

        // Statistiques par campagne
        $campaignStats = MessageWhatsapp::select('nom_campagne',
                DB::raw('COUNT(*) as total_contacts'),
                DB::raw('SUM(CASE WHEN date_envoi IS NOT NULL THEN 1 ELSE 0 END) as sent_messages')
            )
            ->groupBy('nom_campagne')
            ->get();

        // Derniers contacts ajoutés
        $recentContacts = MessageWhatsapp::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'total',
            'campagnes',
            'todayMessages',
            'successRate',
            'campaignStats',
            'recentContacts'
        ));
    }

    public function searchNumbers(Request $request)
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
}
