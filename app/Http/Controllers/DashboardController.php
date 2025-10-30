<?php
namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use App\Models\PushLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Nombre total de contacts
        $total = MessageWhatsapp::count();

        // Liste des campagnes uniques
        $campagnes = MessageWhatsapp::distinct()->pluck('nom_campagne');

        // Nouveaux contacts ajoutés aujourd'hui
        $todayMessages = MessageWhatsapp::whereDate('created_at', today())->count();

        // Statistiques basées sur les pushs réels (table push_logs)
        $totalPushs      = PushLog::count();
        $successfulPushs = PushLog::successful()->count();
        $successRate     = $totalPushs > 0 ? round(($successfulPushs / $totalPushs) * 100, 1) : 0;

        // Pushs envoyés aujourd'hui
        $todayPushs      = PushLog::today()->count();
        $todaySuccessful = PushLog::today()->successful()->count();

        // Statistiques par campagne basées sur les pushs réels
        $campaignStats = PushLog::select('nom_campagne',
            DB::raw('COUNT(*) as total_pushs'),
            DB::raw('SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successful_pushs'),
            DB::raw('SUM(CASE WHEN status = "failed" THEN 1 ELSE 0 END) as failed_pushs')
        )
            ->groupBy('nom_campagne')
            ->get()
            ->map(function ($stat) {
                $stat->success_rate = $stat->total_pushs > 0
                    ? round(($stat->successful_pushs / $stat->total_pushs) * 100, 1)
                    : 0;
                return $stat;
            });

        // Derniers pushs effectués
        $recentPushs = PushLog::orderBy('sent_at', 'desc')
            ->limit(10)
            ->get();

        // Derniers contacts ajoutés
        $recentContacts = MessageWhatsapp::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Statistiques des 7 derniers jours (pour graphique)
        $last7Days = PushLog::select(
            DB::raw('DATE(sent_at) as date'),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as success'),
            DB::raw('SUM(CASE WHEN status = "failed" THEN 1 ELSE 0 END) as failed')
        )
            ->where('sent_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('dashboard', compact(
            'total',
            'campagnes',
            'todayMessages',
            'successRate',
            'campaignStats',
            'recentContacts',
            'totalPushs',
            'successfulPushs',
            'todayPushs',
            'todaySuccessful',
            'recentPushs',
            'last7Days'
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
            ->map(function ($contact) {
                return [
                    'value'    => $contact->numero_telephone . ' - ' . $contact->nom_campagne,
                    'numero'   => $contact->numero_telephone,
                    'campagne' => $contact->nom_campagne,
                    'id'       => $contact->id,
                ];
            });

        return response()->json($results);
    }
}
