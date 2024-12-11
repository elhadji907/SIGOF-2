<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgrementsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'agrements';

    /**
     * Run the migrations.
     * @table agrements
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('sigle', 45)->nullable();
            $table->string('rccm', 200)->nullable();
            $table->string('quitus', 200)->nullable();
            $table->string('ninea', 200)->nullable();
            $table->string('adresse', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telephone', 45)->nullable();
            $table->string('fixe', 45)->nullable();
            $table->string('bp', 200)->nullable();
            $table->string('fax', 45)->nullable();
            $table->string('prenom_responsable', 45)->nullable();
            $table->string('nom_responsable', 45)->nullable();
            $table->string('email_responsable', 45)->nullable();
            $table->string('telephone_responsabel', 45)->nullable();
            $table->string('type', 200)->nullable();
            $table->string('details', 200)->nullable();
            $table->unsignedInteger('gestionnaires_id')->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->unsignedInteger('quitus_id')->nullable();
            $table->unsignedInteger('rccms_id')->nullable();
            $table->unsignedInteger('nineas_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();
            $table->unsignedInteger('communes_id')->nullable();
            $table->string('file1', 200)->nullable();
            $table->string('file2', 200)->nullable();
            $table->string('file3', 200)->nullable();
            $table->string('file4', 200)->nullable();
            $table->string('file5', 200)->nullable();
            $table->string('file6', 200)->nullable();
            $table->string('file7', 200)->nullable();
            $table->string('file8', 200)->nullable();
            $table->string('file9', 200)->nullable();
            $table->string('file10', 200)->nullable();

            $table->index(["gestionnaires_id"], 'fk_agrements_gestionnaires1_idx');

            $table->index(["operateurs_id"], 'fk_agrements_operateurs1_idx');

            $table->index(["rccms_id"], 'fk_agrements_rccms1_idx');

            $table->index(["nineas_id"], 'fk_agrements_nineas1_idx');

            $table->index(["courriers_id"], 'fk_agrements_courriers1_idx');

            $table->index(["communes_id"], 'fk_agrements_communes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('gestionnaires_id', 'fk_agrements_gestionnaires1_idx')
                ->references('id')->on('gestionnaires')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('operateurs_id', 'fk_agrements_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('rccms_id', 'fk_agrements_rccms1_idx')
                ->references('id')->on('rccms')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nineas_id', 'fk_agrements_nineas1_idx')
                ->references('id')->on('nineas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_agrements_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_agrements_communes1_idx')
                ->references('id')->on('communes')
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
