<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('twilio_configs', function (Blueprint $table) {
            $table->id();
            $table->string('account_sid');
            $table->string('auth_token');
            $table->string('content_sid');
            $table->string('from_number');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('twilio_configs');
    }
};
