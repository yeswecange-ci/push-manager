<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MessageWhatsapp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un utilisateur admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@yeswecange.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'josias.ci@yeswecange.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'hermann.koffi@yeswecange.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Manager',
            'email' => 'julien@yeswecange.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // // Créer des contacts de test
        // $campagnes = [
        //     'Campagne_Printemps',
        //     'Campagne_Ete',
        //     'Campagne_Promo',
        //     'Campagne_Black_Friday',
        //     'Campagne_Noel'
        // ];

        // for ($i = 1; $i <= 50; $i++) {
        //     MessageWhatsapp::create([
        //         'numero_telephone' => '+336' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
        //         'nom_campagne' => $campagnes[array_rand($campagnes)],
        //         'date_envoi' => now()->subDays(rand(0, 30)),
        //         'id_twilio' => 'TW' . strtoupper(bin2hex(random_bytes(8))),
        //     ]);
        // }
    }
}
