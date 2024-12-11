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
        Schema::create('commissionagrements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('commission')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('session')->nullable();
            $table->string('lieu')->nullable();
            $table->string('annee')->nullable();
            $table->string('statut')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissionagrements');
    }
};
