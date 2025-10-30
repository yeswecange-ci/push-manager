<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    /**
     * Scope pour les pushs réussis
     */
    public function scopeSuccessful($query)
    {
        return $query->where('status', 'success');
    }

    /**
     * Scope pour les pushs échoués
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /**
     * Scope pour une campagne spécifique
     */
    public function scopeForCampaign($query, $campaign)
    {
        return $query->where('nom_campagne', $campaign);
    }

    /**
     * Scope pour aujourd'hui
     */
    public function scopeToday($query)
    {
        return $query->whereDate('sent_at', today());
    }

    /**
     * Scope pour une période donnée
     */
    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('sent_at', [$startDate, $endDate]);
    }
}
