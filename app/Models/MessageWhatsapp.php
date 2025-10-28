<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageWhatsapp extends Model
{
    use HasFactory;

    protected $table = 'new_message_whatsapp';

    protected $fillable = [
        'numero_telephone',
        'nom_campagne',
        'date_envoi',
        'id_twilio'
    ];

    protected $casts = [
        'date_envoi' => 'datetime',
    ];
}
