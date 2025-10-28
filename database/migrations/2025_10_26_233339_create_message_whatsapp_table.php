<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('new_message_whatsapp', function (Blueprint $table) {
            $table->id();
            $table->string('numero_telephone');
            $table->string('nom_campagne');
            $table->timestamp('date_envoi')->nullable();
            $table->string('id_twilio')->nullable();
            $table->timestamps();

            $table->index('nom_campagne');
            $table->index('numero_telephone');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('new_message_whatsapp');
    }
};
