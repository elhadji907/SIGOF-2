<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'collectives';

    /**
     * Run the migrations.
     * @table collectives
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
            $table->longText('name')->nullable();
            $table->string('sigle', 100)->nullable();
            $table->timestamp('date_depot')->nullable();
            $table->string('statut_demande', 100)->nullable();
            $table->string('validated_by', 100)->nullable();
            $table->string('statut_juridique', 100)->nullable();
            $table->string('autre_statut_juridique', 100)->nullable();
            $table->longText('description')->nullable();
            $table->string('type', 45)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('telephone', 45)->nullable();
            $table->string('fixe', 45)->nullable();
            $table->string('bp', 200)->nullable();
            $table->string('fax', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->longText('projetprofessionnel')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('prerequis')->nullable();
            $table->longText('motivation')->nullable();
            $table->integer('nbre_pieces')->nullable();
            $table->string('items1', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->string('file1', 200)->nullable();
            $table->string('file2', 200)->nullable();
            $table->string('file3', 200)->nullable();
            $table->string('legende_recipice', 200)->nullable();
            $table->string('file_recipice', 200)->nullable();
            $table->string('civilite_responsable')->nullable(true);
            $table->string('nom_responsable', 200)->nullable();
            $table->string('prenom_responsable', 200)->nullable();
            $table->string('cin_responsable', 200)->nullable();
            $table->string('telephone_responsable', 45)->nullable();
            $table->string('email_responsable', 45)->nullable();
            $table->string('fonction_responsable', 200)->nullable();
            $table->unsignedInteger('demandeurs_id')->nullable();
            $table->unsignedInteger('ingenieurs_id')->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->unsignedInteger('etudes_id')->nullable();
            $table->unsignedInteger('antennes_id')->nullable();
            $table->unsignedInteger('programmes_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('conventions_id')->nullable();
            $table->unsignedInteger('fcollectives_id')->nullable();
            $table->unsignedInteger('modules_id')->nullable();
            $table->unsignedInteger('users_id');

            $table->index(["demandeurs_id"], 'fk_collectives_demandeurs1_idx');

            $table->index(["ingenieurs_id"], 'fk_collectives_ingenieurs1_idx');

            $table->index(["formations_id"], 'fk_collectives_formations1_idx');

            $table->index(["departements_id"], 'fk_collectives_departements1_idx');

            $table->index(["regions_id"], 'fk_collectives_regions1_idx');

            $table->index(["communes_id"], 'fk_collectives_communes1_idx');

            $table->index(["etudes_id"], 'fk_collectives_etudes1_idx');

            $table->index(["antennes_id"], 'fk_collectives_antennes1_idx');

            $table->index(["programmes_id"], 'fk_collectives_programmes1_idx');

            $table->index(["projets_id"], 'fk_collectives_projets1_idx');

            $table->index(["conventions_id"], 'fk_collectives_conventions1_idx');

            $table->index(["fcollectives_id"], 'fk_collectives_fcollectives1_idx');

            $table->index(["modules_id"], 'fk_collectives_modules1_idx');

            $table->index(["users_id"], 'fk_collectives_users1_idx');

            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('demandeurs_id', 'fk_collectives_demandeurs1_idx')
                ->references('id')->on('demandeurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ingenieurs_id', 'fk_collectives_ingenieurs1_idx')
                ->references('id')->on('ingenieurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('formations_id', 'fk_collectives_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_collectives_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_collectives_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_collectives_communes1_idx')
                ->references('id')->on('communes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('etudes_id', 'fk_collectives_etudes1_idx')
                ->references('id')->on('etudes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('antennes_id', 'fk_collectives_antennes1_idx')
                ->references('id')->on('antennes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_collectives_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_collectives_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('conventions_id', 'fk_collectives_conventions1_idx')
                ->references('id')->on('conventions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('fcollectives_id', 'fk_collectives_fcollectives1_idx')
                ->references('id')->on('fcollectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_collectives_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_collectives_users1_idx')
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
