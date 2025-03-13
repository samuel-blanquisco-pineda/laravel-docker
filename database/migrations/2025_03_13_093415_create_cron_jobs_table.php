<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cron_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('frequency')->default('hourly'); // Guardamos la frecuencia
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cron_jobs');
    }
};