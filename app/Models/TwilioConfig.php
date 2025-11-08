<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwilioConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_name',
        'account_sid',
        'auth_token',
        'content_sid',
        'from_number',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Récupère la configuration Twilio active
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Désactive toutes les autres configurations et active celle-ci
     */
    public function setAsActive()
    {
        // Désactive toutes les configurations
        self::where('id', '!=', $this->id)->update(['is_active' => false]);

        // Active celle-ci
        $this->update(['is_active' => true]);
    }

    /**
     * Récupère toutes les configurations
     */
    public static function getAllConfigs()
    {
        return self::orderBy('is_active', 'desc')
                   ->orderBy('channel_name', 'asc')
                   ->get();
    }
}
