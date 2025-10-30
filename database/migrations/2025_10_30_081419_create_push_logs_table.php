<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('push_logs', function (Blueprint $table) {
            $table->id();
            $table->string('message_sid')->nullable()->index(); // ID Twilio
            $table->string('numero_telephone');
            $table->string('nom_campagne');
            $table->enum('status', ['success', 'failed', 'pending'])->default('pending');
            $table->text('error_message')->nullable();
            $table->timestamp('sent_at'); // Date et heure du push
            $table->timestamps();

            // Index pour optimiser les requêtes
            $table->index('nom_campagne');
            $table->index('status');
            $table->index('sent_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('push_logs');
    }
};
