<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero_dossier', 200)->nullable();
            $table->string('numero_arrive', 200)->nullable();
            $table->string('numero_agrement', 200)->nullable();
            $table->timestamp('date_depot')->nullable();
            $table->timestamp('annee_agrement')->nullable();
            $table->timestamp('session_agrement')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('date_debut')->nullable();
            $table->timestamp('date_fin')->nullable();
            $table->timestamp('date_renew')->nullable();
            $table->string('quitus', 200)->nullable();
            $table->dateTime('debut_quitus')->nullable();
            $table->dateTime('fin_quitus')->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('commission', 200)->nullable();
            /* $table->string('civilite_responsable')->nullable(true);
            $table->string('nom_responsable', 200)->nullable();
            $table->string('prenom_responsable', 200)->nullable();
            $table->string('cin_responsable', 200)->nullable();
            $table->string('telephone_responsable', 45)->nullable();
            $table->string('email_responsable', 45)->nullable();
            $table->string('fonction_responsable', 200)->nullable(); */
            $table->string('statut_agrement', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->string('autre_statut', 200)->nullable();
            $table->string('type_demande', 200)->nullable();
            $table->string('web', 200)->nullable();
            $table->longText('motif')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('rccms_id')->nullable();
            $table->unsignedInteger('nineas_id')->nullable();
            $table->unsignedInteger('types_operateurs_id')->nullable();
            $table->unsignedInteger('specialites_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->unsignedInteger('commissionagrements_id')->nullable();
            $table->unsignedInteger('historiqueagrements_id')->nullable();
            $table->longText('observations')->nullable();
            $table->string('visite_conformite', 200)->nullable();
            $table->string('arrete_creation', 200)->nullable();
            $table->string('file_arrete_creation', 200)->nullable();
            $table->string('demande_signe', 200)->nullable();
            $table->string('formulaire_signe', 200)->nullable();
            $table->string('quitusfiscal', 200)->nullable();
            $table->string('cvsigne', 200)->nullable();
            $table->string('file8', 200)->nullable();
            $table->string('file9', 200)->nullable();
            $table->string('file10', 200)->nullable();

            $table->index(["users_id"], 'fk_operateurs_users1_idx');

            $table->index(["rccms_id"], 'fk_operateurs_rccms1_idx');

            $table->index(["nineas_id"], 'fk_operateurs_nineas1_idx');

            $table->index(["types_operateurs_id"], 'fk_operateurs_types_operateurs1_idx');

            $table->index(["specialites_id"], 'fk_operateurs_specialites1_idx');

            $table->index(["courriers_id"], 'fk_operateurs_courriers1_idx');

            $table->index(["communes_id"], 'fk_operateurs_communes1_idx');

            $table->index(["departements_id"], 'fk_operateurs_departements1_idx');

            $table->index(["regions_id"], 'fk_operateurs_regions1_idx');

            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_operateurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('rccms_id', 'fk_operateurs_rccms1_idx')
                ->references('id')->on('rccms')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nineas_id', 'fk_operateurs_nineas1_idx')
                ->references('id')->on('nineas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('types_operateurs_id', 'fk_operateurs_types_operateurs1_idx')
                ->references('id')->on('types_operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('specialites_id', 'fk_operateurs_specialites1_idx')
                ->references('id')->on('specialites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_operateurs_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_operateurs_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_operateurs_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_operateurs_regions1_idx')
                ->references('id')->on('regions')
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
