<?php
namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use App\Models\PushLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Nombre total de contacts
        $total = MessageWhatsapp::count();

        // Croissance des contacts ce mois
        $totalGrowth = $this->calculateContactGrowth();

        // Liste des campagnes uniques
        $campagnes = MessageWhatsapp::distinct()->pluck('nom_campagne');

        // Nouveaux contacts ajoutés aujourd'hui
        $todayMessages = MessageWhatsapp::whereDate('created_at', today())->count();

        // Croissance des contacts aujourd'hui vs hier
        $todayGrowth = $this->calculateTodayGrowth();

        // Statistiques basées sur les pushs réels (table push_logs)
        $totalPushs      = PushLog::count();
        $successfulPushs = PushLog::successful()->count();
        $successRate     = $totalPushs > 0 ? round(($successfulPushs / $totalPushs) * 100, 1) : 0;

        // Croissance du taux de réussite
        $successRateGrowth = $this->calculateSuccessRateGrowth();

        // Pushs envoyés aujourd'hui
        $todayPushs      = PushLog::today()->count();
        $todaySuccessful = PushLog::today()->successful()->count();
        $todaySuccessRate = $todayPushs > 0 ? round(($todaySuccessful / $todayPushs) * 100, 1) : 0;

        // Croissance des pushs aujourd'hui vs hier
        $todayPushsGrowth = $this->calculateTodayPushsGrowth();

        // Temps de réponse moyen - CORRECTION ICI
        $avgResponseTime = PushLog::successful()->avg('response_time') ?? 0;
        $avgResponseTime = $avgResponseTime ? round($avgResponseTime, 1) : 0;

        // Tendance du temps de réponse
        $responseTimeTrend = $this->calculateResponseTimeTrend();

        // Campagnes actives
        $activeCampaignsCount = PushLog::where('sent_at', '>=', now()->subDays(1))
            ->distinct('nom_campagne')
            ->count('nom_campagne');

        $totalCampaigns = PushLog::distinct('nom_campagne')->count('nom_campagne');

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

        // Statistiques par tranche horaire - CORRECTION ICI
        $hourlyStats = $this->getHourlyStats();
        $maxHourlyPushs = $hourlyStats->max('pushs') ?? 1;

        // Activité des 7 derniers jours (pour graphique) - CORRECTION ICI
        $weeklyActivity = $this->getWeeklyActivity();
        $maxDailyPushs = $weeklyActivity->max('pushs') ?? 1;

        // Alertes et notifications
        $alerts = $this->getSystemAlerts();

        return view('dashboard', compact(
            'total',
            'totalGrowth',
            'campagnes',
            'todayMessages',
            'todayGrowth',
            'successRate',
            'successRateGrowth',
            'campaignStats',
            'totalPushs',
            'successfulPushs',
            'todayPushs',
            'todaySuccessful',
            'todaySuccessRate',
            'todayPushsGrowth',
            'recentPushs',
            'avgResponseTime',
            'responseTimeTrend',
            'activeCampaignsCount',
            'totalCampaigns',
            'hourlyStats',
            'maxHourlyPushs',
            'weeklyActivity',
            'maxDailyPushs',
            'alerts'
        ));
    }

    /**
     * Calcule la croissance des contacts ce mois
     */
    private function calculateContactGrowth()
    {
        $currentMonthCount = MessageWhatsapp::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        $lastMonthCount = MessageWhatsapp::whereYear('created_at', now()->subMonth()->year)
            ->whereMonth('created_at', now()->subMonth()->month)
            ->count();

        if ($lastMonthCount == 0) {
            return $currentMonthCount > 0 ? 100 : 0;
        }

        return round((($currentMonthCount - $lastMonthCount) / $lastMonthCount) * 100, 1);
    }

    /**
     * Calcule la croissance des contacts aujourd'hui vs hier
     */
    private function calculateTodayGrowth()
    {
        $todayCount = MessageWhatsapp::whereDate('created_at', today())->count();
        $yesterdayCount = MessageWhatsapp::whereDate('created_at', today()->subDay())->count();

        if ($yesterdayCount == 0) {
            return $todayCount > 0 ? 100 : 0;
        }

        return round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100, 1);
    }

    /**
     * Calcule la croissance du taux de réussite
     */
    private function calculateSuccessRateGrowth()
    {
        $currentMonthRate = PushLog::whereYear('sent_at', now()->year)
            ->whereMonth('sent_at', now()->month)
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as success')
            ->first();

        $lastMonthRate = PushLog::whereYear('sent_at', now()->subMonth()->year)
            ->whereMonth('sent_at', now()->subMonth()->month)
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as success')
            ->first();

        $currentRate = ($currentMonthRate->total ?? 0) > 0 ? (($currentMonthRate->success ?? 0) / ($currentMonthRate->total ?? 1)) * 100 : 0;
        $lastRate = ($lastMonthRate->total ?? 0) > 0 ? (($lastMonthRate->success ?? 0) / ($lastMonthRate->total ?? 1)) * 100 : 0;

        if ($lastRate == 0) {
            return $currentRate > 0 ? round($currentRate, 1) : 0;
        }

        return round($currentRate - $lastRate, 1);
    }

    /**
     * Calcule la croissance des pushs aujourd'hui vs hier
     */
    private function calculateTodayPushsGrowth()
    {
        $todayCount = PushLog::whereDate('sent_at', today())->count();
        $yesterdayCount = PushLog::whereDate('sent_at', today()->subDay())->count();

        if ($yesterdayCount == 0) {
            return $todayCount > 0 ? 100 : 0;
        }

        return round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100, 1);
    }

    /**
     * Calcule la tendance du temps de réponse
     */
    private function calculateResponseTimeTrend()
    {
        $todayAvg = PushLog::successful()
            ->whereDate('sent_at', today())
            ->avg('response_time') ?? 0;

        $yesterdayAvg = PushLog::successful()
            ->whereDate('sent_at', today()->subDay())
            ->avg('response_time') ?? 0;

        if ($yesterdayAvg == 0) {
            return $todayAvg > 0 ? 100 : 0;
        }

        return round((($todayAvg - $yesterdayAvg) / $yesterdayAvg) * 100, 1);
    }

    /**
     * Récupère les statistiques par tranche horaire
     */
    private function getHourlyStats()
    {
        $today = now()->toDateString();

        $stats = PushLog::whereDate('sent_at', $today)
            ->select(
                DB::raw('HOUR(sent_at) as hour'),
                DB::raw('COUNT(*) as pushs')
            )
            ->groupBy(DB::raw('HOUR(sent_at)'))
            ->orderBy('hour')
            ->get();

        // Compléter avec les heures manquantes
        $hourlyStats = collect();
        for ($i = 0; $i < 24; $i++) {
            $hourStat = $stats->firstWhere('hour', $i);
            $hourlyStats->push([
                'hour' => sprintf('%02dh', $i),
                'pushs' => $hourStat ? $hourStat->pushs : 0
            ]);
        }

        return $hourlyStats;
    }

    /**
     * Récupère l'activité des 7 derniers jours
     */
    private function getWeeklyActivity()
    {
        $startDate = now()->subDays(6)->startOfDay();

        $stats = PushLog::where('sent_at', '>=', $startDate)
            ->select(
                DB::raw('DATE(sent_at) as date'),
                DB::raw('COUNT(*) as pushs')
            )
            ->groupBy(DB::raw('DATE(sent_at)'))
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $weeklyActivity = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->toDateString();
            $dayStat = $stats->get($dateString);

            $weeklyActivity->push([
                'date' => $dateString,
                'label' => $date->format('D'),
                'pushs' => $dayStat ? $dayStat->pushs : 0
            ]);
        }

        return $weeklyActivity;
    }

    /**
     * Récupère les alertes système
     */
    private function getSystemAlerts()
    {
        $alerts = collect();

        // Vérifier les campagnes avec faible taux de réussite
        $lowSuccessCampaigns = PushLog::select('nom_campagne')
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as success')
            ->groupBy('nom_campagne')
            ->havingRaw('(success / total) < 0.5')
            ->having('total', '>', 10)
            ->get();

        foreach ($lowSuccessCampaigns as $campaign) {
            $rate = ($campaign->total > 0) ? round(($campaign->success / $campaign->total) * 100, 1) : 0;
            $alerts->push([
                'type' => 'warning',
                'title' => 'Taux de réussite faible',
                'message' => "La campagne '{$campaign->nom_campagne}' a un taux de réussite de {$rate}%"
            ]);
        }

        // Vérifier les erreurs récentes
        $recentErrors = PushLog::failed()
            ->where('sent_at', '>=', now()->subHours(2))
            ->count();

        if ($recentErrors > 5) {
            $alerts->push([
                'type' => 'red',
                'title' => 'Erreurs multiples détectées',
                'message' => "{$recentErrors} pushs ont échoué dans les 2 dernières heures"
            ]);
        }

        // Vérifier si Twilio est configuré
        if (empty(env('TWILIO_SID')) || empty(env('TWILIO_TOKEN'))) {
            $alerts->push([
                'type' => 'red',
                'title' => 'Configuration Twilio manquante',
                'message' => 'Les identifiants Twilio ne sont pas configurés'
            ]);
        }

        return $alerts;
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
