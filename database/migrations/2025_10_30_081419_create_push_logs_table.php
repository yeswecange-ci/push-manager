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
            $table->string('campaign_id')->nullable(); // NOUVEAU CHAMP
            $table->enum('status', ['success', 'failed', 'pending'])->default('pending');
            $table->text('error_message')->nullable();
            $table->decimal('response_time', 8, 3)->nullable(); // NOUVEAU CHAMP
            $table->text('message_content')->nullable(); // NOUVEAU CHAMP
            $table->timestamp('sent_at'); // Date et heure du push
            $table->timestamps();

            // Index pour optimiser les requêtes
            $table->index('nom_campagne');
            $table->index('status');
            $table->index('sent_at');
            $table->index(['sent_at', 'status']); // NOUVEAU INDEX COMPOSITE
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
