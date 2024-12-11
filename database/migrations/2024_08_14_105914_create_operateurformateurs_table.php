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
        Schema::create('operateurformateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('cin')->nullable();
            $table->string('name')->nullable();
            $table->string('domaine')->nullable();
            $table->string('nbre_annees_experience')->nullable();
            $table->longText('references')->nullable();
            $table->string('statut')->nullable();
            $table->string('file')->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
            
            $table->index(["operateurs_id"], 'fk_operateurformateurs_operateurs1_idx');
            

            $table->foreign('operateurs_id', 'fk_operateurformateurs_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operateurformateurs');
    }
};
