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
        Schema::create('projetlocalites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('localite')->nullable();
            $table->string('effectif')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
            
            $table->index(["projets_id"], 'fk_projetlocalites_projets1_idx');

            $table->foreign('projets_id', 'fk_projetlocalites_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetlocalites');
    }
};
