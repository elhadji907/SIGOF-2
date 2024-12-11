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
        Schema::create('operateurequipements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('designation')->nullable();
            $table->string('quantite')->nullable();
            $table->string('etat')->nullable();
            $table->longText('details')->nullable();
            $table->string('statut')->nullable();
            $table->string('type')->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
            
            $table->index(["operateurs_id"], 'fk_operateurequipements_operateurs1_idx');
            

            $table->foreign('operateurs_id', 'fk_operateurequipements_operateurs1_idx')
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
        Schema::dropIfExists('operateurequipements');
    }
};
