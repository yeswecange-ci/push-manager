<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('twilio_configs', function (Blueprint $table) {
            $table->string('channel_name')->after('id');
        });
    }

    public function down()
    {
        Schema::table('twilio_configs', function (Blueprint $table) {
            $table->dropColumn('channel_name');
        });
    }
};
