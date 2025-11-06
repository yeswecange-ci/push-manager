<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PushLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_sid',
        'numero_telephone',
        'nom_campagne',
        'status',
        'error_message',
        'sent_at',
        'response_time', // Nouveau champ ajouté
        'message_content', // Nouveau champ optionnel pour stocker le contenu du message
        'campaign_id', // Nouveau champ optionnel pour lier à une campagne
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'response_time' => 'decimal:3', // Précision à 3 décimales pour les secondes
    ];

    /**
     * Scope pour les pushs réussis
     */
    public function scopeSuccessful(Builder $query): Builder
    {
        return $query->where('status', 'success');
    }

    /**
     * Scope pour les pushs échoués
     */
    public function scopeFailed(Builder $query): Builder
    {
        return $query->where('status', 'failed');
    }

    /**
     * Scope pour une campagne spécifique
     */
    public function scopeForCampaign(Builder $query, string $campaign): Builder
    {
        return $query->where('nom_campagne', $campaign);
    }

    /**
     * Scope pour aujourd'hui
     */
    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('sent_at', today());
    }

    /**
     * Scope pour les pushs récents (7 derniers jours par défaut)
     */
    public function scopeRecent(Builder $query, int $days = 7): Builder
    {
        return $query->where('sent_at', '>=', now()->subDays($days));
    }

    /**
     * Scope pour une période donnée
     */
    public function scopeBetweenDates(Builder $query, $startDate, $endDate): Builder
    {
        return $query->whereBetween('sent_at', [$startDate, $endDate]);
    }

    /**
     * Scope pour les pushs du mois en cours
     */
    public function scopeCurrentMonth(Builder $query): Builder
    {
        return $query->whereYear('sent_at', now()->year)
                    ->whereMonth('sent_at', now()->month);
    }

    /**
     * Scope pour les pushs du mois dernier
     */
    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->whereYear('sent_at', now()->subMonth()->year)
                    ->whereMonth('sent_at', now()->subMonth()->month);
    }

    /**
     * Scope pour les pushs des dernières heures
     */
    public function scopeLastHours(Builder $query, int $hours): Builder
    {
        return $query->where('sent_at', '>=', now()->subHours($hours));
    }

    /**
     * Scope pour les pushs avec un temps de réponse supérieur à un seuil
     */
    public function scopeSlowResponse(Builder $query, float $threshold = 5.0): Builder
    {
        return $query->where('response_time', '>', $threshold)
                    ->whereNotNull('response_time');
    }

    /**
     * Relation avec les contacts (si vous avez une table contacts)
     */
    public function contact()
    {
        return $this->belongsTo(MessageWhatsapp::class, 'numero_telephone', 'numero_telephone');
    }

    /**
     * Accessor pour le statut formaté
     */
    public function getFormattedStatusAttribute(): string
    {
        return $this->status === 'success' ? 'Réussi' : 'Échoué';
    }

    /**
     * Accessor pour le temps de réponse formaté
     */
    public function getFormattedResponseTimeAttribute(): string
    {
        if (!$this->response_time) {
            return 'N/A';
        }

        return number_format($this->response_time, 2) . 's';
    }

    /**
     * Accessor pour la date d'envoi formatée
     */
    public function getFormattedSentAtAttribute(): string
    {
        return $this->sent_at?->format('d/m/Y H:i') ?? 'N/A';
    }

    /**
     * Vérifie si le push est récent (moins de 5 minutes)
     */
    public function getIsRecentAttribute(): bool
    {
        return $this->sent_at && $this->sent_at->gt(now()->subMinutes(5));
    }

    /**
     * Méthode pour marquer un push comme réussi
     */
    public function markAsSuccess(float $responseTime = null): void
    {
        $this->update([
            'status' => 'success',
            'response_time' => $responseTime,
            'error_message' => null,
        ]);
    }

    /**
     * Méthode pour marquer un push comme échoué
     */
    public function markAsFailed(string $errorMessage = null): void
    {
        $this->update([
            'status' => 'failed',
            'error_message' => $errorMessage,
            'response_time' => null,
        ]);
    }

    /**
     * Récupère les statistiques par heure pour une date donnée
     */
    public static function getHourlyStats(string $date = null): \Illuminate\Support\Collection
    {
        $date = $date ?: today()->toDateString();

        return self::whereDate('sent_at', $date)
            ->selectRaw('HOUR(sent_at) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->hour => $item->count];
            });
    }

    /**
     * Récupère les statistiques quotidiennes pour une période
     */
    public static function getDailyStats(int $days = 30): \Illuminate\Support\Collection
    {
        return self::where('sent_at', '>=', now()->subDays($days))
            ->selectRaw('DATE(sent_at) as date, COUNT(*) as total,
                        SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as success,
                        SUM(CASE WHEN status = "failed" THEN 1 ELSE 0 END) as failed')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    /**
     * Récupère le taux de réussite par campagne
     */
    public static function getCampaignSuccessRates(): \Illuminate\Support\Collection
    {
        return self::select('nom_campagne')
            ->selectRaw('COUNT(*) as total_pushs,
                        SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) as successful_pushs,
                        SUM(CASE WHEN status = "failed" THEN 1 ELSE 0 END) as failed_pushs,
                        ROUND((SUM(CASE WHEN status = "success" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 1) as success_rate')
            ->groupBy('nom_campagne')
            ->having('total_pushs', '>', 0)
            ->orderByDesc('total_pushs')
            ->get();
    }

    /**
     * Récupère les performances globales
     */
    public static function getPerformanceStats(): array
    {
        $total = self::count();
        $successful = self::successful()->count();
        $failed = self::failed()->count();
        $avgResponseTime = self::successful()->avg('response_time');

        return [
            'total' => $total,
            'successful' => $successful,
            'failed' => $failed,
            'success_rate' => $total > 0 ? round(($successful / $total) * 100, 1) : 0,
            'avg_response_time' => round($avgResponseTime ?? 0, 2),
        ];
    }

    /**
     * Boot du modèle
     */
    protected static function boot()
    {
        parent::boot();

        // Définir la date d'envoi par défaut à maintenant lors de la création
        static::creating(function ($model) {
            if (empty($model->sent_at)) {
                $model->sent_at = now();
            }
        });
    }
}
