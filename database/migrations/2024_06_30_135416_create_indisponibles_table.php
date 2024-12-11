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
        Schema::create('indisponibles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->longText('motif')->nullable();
            $table->unsignedInteger('individuelles_id')->nullable();
            $table->unsignedInteger('formations_id')->nullable();

            $table->softDeletes();
            $table->nullableTimestamps();

            
            $table->index(["individuelles_id"], 'fk_indisponibles_individuelles1_idx');
            $table->index(["individuelles_id"], 'fk_formationss_individuelles1_idx');
            

            $table->foreign('individuelles_id', 'fk_indisponibles_individuelles1_idx')
                ->references('id')->on('individuelles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('individuelles_id', 'fk_formationss_individuelles1_idx')
                ->references('id')->on('individuelles')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indisponibles');
    }
};
