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
        Schema::create('listecollectives', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('civilite')->nullable();
            $table->string('cin')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('niveau_etude')->nullable();
            $table->string('telephone')->nullable();
            $table->string('experience')->nullable();
            $table->string('autre_experience')->nullable();
            $table->longText('details')->nullable();
            $table->longText('suivi')->nullable();
            $table->longText('informations_suivi')->nullable();
            $table->string('statut')->nullable();
            $table->integer('nbre_pieces')->nullable();
            $table->integer('nbre_enfants')->nullable();
            $table->double('note_obtenue')->nullable();
            $table->string('niveau_maitrise', 200)->nullable();
            $table->longText('observations')->nullable();
            $table->string('appreciation', 200)->nullable();
            $table->longText('motif_rejet')->nullable();
            $table->longText('retrait_diplome')->nullable();
            $table->longText('diplome_retirer_by')->nullable();
            $table->unsignedInteger('collectives_id')->nullable();
            $table->unsignedInteger('collectivemodules_id')->nullable();
            $table->unsignedInteger('modules_id')->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(["collectives_id"], 'fk_listecollectives_collectives1_idx');

            $table->foreign('collectives_id', 'fk_listecollectives_collectives1_idx')
                ->references('id')->on('collectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index(["modules_id"], 'fk_listecollectives_modules1_idx');

            $table->foreign('modules_id', 'fk_listecollectives_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listecollectives');
    }
};
