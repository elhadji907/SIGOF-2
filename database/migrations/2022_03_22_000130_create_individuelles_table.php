<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividuellesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'individuelles';

    /**
     * Run the migrations.
     * @table individuelles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->unique()->nullable();
            $table->longText('experience')->nullable();
            $table->longText('prerequis')->nullable();
            $table->longText('information')->nullable();
            $table->timestamp('date_depot')->nullable();
            $table->double('note')->nullable();
            $table->string('statut', 45)->nullable();
            $table->string('type', 45)->nullable();
            $table->string('qualification', 200)->nullable();
            $table->string('niveau_etude', 200)->nullable();
            $table->string('diplome_academique', 200)->nullable();
            $table->string('autre_diplome_academique', 200)->nullable();
            $table->string('option_diplome_academique', 200)->nullable();
            $table->string('etablissement_academique', 200)->nullable();
            $table->string('diplome_professionnel', 200)->nullable();
            $table->string('autre_diplome_professionnel', 200)->nullable();
            $table->string('specialite_diplome_professionnel', 200)->nullable();
            $table->string('etablissement_professionnel', 200)->nullable();
            $table->string('projet_poste_formation', 200)->nullable();
            $table->longText('projetprofessionnel')->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->longText('motivation')->nullable();
            $table->longText('motif')->nullable();
            $table->integer('annee_diplome')->nullable();
            $table->integer('annee_diplome_professionelle')->nullable();
            $table->integer('nbre_enfant')->nullable();
            $table->string('activite_travail', 200)->nullable();
            $table->string('travail_renumeration', 200)->nullable();
            $table->string('activite_avenir', 200)->nullable();
            $table->string('handicap', 45)->nullable();
            $table->string('situation_economique', 200)->nullable();
            $table->string('victime_social', 200)->nullable();
            $table->string('autre_victime', 200)->nullable();
            $table->string('salaire', 200)->nullable();
            $table->string('preciser_handicap', 200)->nullable();
            $table->longText('dossier')->nullable();
            $table->longText('autre_diplomes_fournis')->nullable();
            $table->string('items1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->string('item1', 200)->nullable();
            $table->string('item2', 200)->nullable();
            $table->string('file1', 200)->nullable();
            $table->string('file2', 200)->nullable();
            $table->string('file3', 200)->nullable();
            $table->string('file4', 200)->nullable();
            $table->string('attestation', 200)->nullable();
            $table->longText('suivi')->nullable();
            $table->longText('informations_suivi')->nullable();
            $table->integer('nbre_pieces')->nullable();
            $table->integer('nbre_enfants')->nullable();
            $table->double('note_obtenue')->nullable();
            $table->string('niveau_maitrise', 200)->nullable();
            $table->longText('observations')->nullable();
            $table->string('appreciation', 200)->nullable();
            $table->longText('retrait_diplome')->nullable();
            $table->longText('diplome_retirer_by')->nullable();
            $table->longText('motif_rejet')->nullable();
            $table->string('created_by', 200)->nullable();
            $table->string('updated_by', 200)->nullable();
            $table->string('deleted_by', 200)->nullable();
            $table->string('validated_by', 200)->nullable();
            $table->string('canceled_by', 200)->nullable();
            $table->unsignedInteger('demandeurs_id')->nullable();
            $table->unsignedInteger('etudes_id')->nullable();
            $table->unsignedInteger('antennes_id')->nullable();
            $table->unsignedInteger('diplomes_id')->nullable();
            $table->unsignedInteger('conventions_id')->nullable();
            $table->unsignedInteger('diplomespros_id')->nullable();
            $table->unsignedInteger('modules_id')->nullable();
            $table->string('autre_module', 200)->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->unsignedInteger('zones_id')->nullable();
            $table->unsignedInteger('localites_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('programmes_id')->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->unsignedInteger('arrondissements_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->unsignedInteger('users_id');

            $table->index(["demandeurs_id"], 'fk_individuelles_demandeurs1_idx');

            $table->index(["etudes_id"], 'fk_individuelles_etudes1_idx');

            $table->index(["antennes_id"], 'fk_individuelles_antennes1_idx');

            $table->index(["diplomes_id"], 'fk_individuelles_diplomes1_idx');

            $table->index(["conventions_id"], 'fk_individuelles_conventions1_idx');

            $table->index(["diplomespros_id"], 'fk_individuelles_diplomespros1_idx');

            $table->index(["modules_id"], 'fk_individuelles_modules1_idx');

            $table->index(["formations_id"], 'fk_individuelles_formations1_idx');

            $table->index(["zones_id"], 'fk_individuelles_zones1_idx');

            $table->index(["localites_id"], 'fk_individuelles_localites1_idx');

            $table->index(["projets_id"], 'fk_individuelles_projets1_idx');

            $table->index(["programmes_id"], 'fk_individuelles_programmes1_idx');

            $table->index(["arrondissements_id"], 'fk_individuelles_arrondissements1_idx');

            $table->index(["regions_id"], 'fk_individuelles_regions1_idx');

            $table->index(["communes_id"], 'fk_individuelles_communes1_idx');

            $table->index(["departements_id"], 'fk_individuelles_departements1_idx');

            $table->index(["users_id"], 'fk_individuelles_users1_idx');
            
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_individuelles_demandeurs1_idx')
                ->references('id')->on('demandeurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('etudes_id', 'fk_individuelles_etudes1_idx')
                ->references('id')->on('etudes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('antennes_id', 'fk_individuelles_antennes1_idx')
                ->references('id')->on('antennes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('diplomes_id', 'fk_individuelles_diplomes1_idx')
                ->references('id')->on('diplomes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('conventions_id', 'fk_individuelles_conventions1_idx')
                ->references('id')->on('conventions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('diplomespros_id', 'fk_individuelles_diplomespros1_idx')
                ->references('id')->on('diplomespros')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_individuelles_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_individuelles_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('zones_id', 'fk_individuelles_zones1_idx')
                ->references('id')->on('zones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localites_id', 'fk_individuelles_localites1_idx')
                ->references('id')->on('localites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_individuelles_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_individuelles_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('arrondissements_id', 'fk_individuelles_arrondissements1_idx')
                ->references('id')->on('arrondissements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_individuelles_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_individuelles_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_individuelles_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');
                
            $table->foreign('users_id', 'fk_individuelles_users1_idx')
            ->references('id')->on('users')
            ->onDelete('no action')
            ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
