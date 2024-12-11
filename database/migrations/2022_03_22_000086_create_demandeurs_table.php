<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandeursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'demandeurs';

    /**
     * Run the migrations.
     * @table demandeurs
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
            $table->string('statut', 45)->nullable();
            $table->string('type', 200)->nullable();
            $table->string('items1', 200)->nullable();
            $table->string('items2', 200)->nullable();
            $table->timestamp('date1')->nullable();
            $table->string('file1', 200)->nullable();
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('items_id')->nullable();
            $table->unsignedInteger('types_demandes_id')->nullable();
            $table->unsignedInteger('courriers_id')->nullable();
            $table->unsignedInteger('zones_id')->nullable();
            $table->unsignedInteger('localites_id')->nullable();
            $table->unsignedInteger('arrondissements_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('communes_id')->nullable();

            $table->index(["users_id"], 'fk_demandeurs_users1_idx');

            $table->index(["items_id"], 'fk_demandeurs_items1_idx');

            $table->index(["types_demandes_id"], 'fk_demandeurs_types_demandes1_idx');

            $table->index(["courriers_id"], 'fk_demandeurs_courriers1_idx');

            $table->index(["zones_id"], 'fk_demandeurs_zones1_idx');

            $table->index(["localites_id"], 'fk_demandeurs_localites1_idx');

            $table->index(["arrondissements_id"], 'fk_demandeurs_arrondissements1_idx');

            $table->index(["regions_id"], 'fk_demandeurs_regions1_idx');

            $table->index(["departements_id"], 'fk_demandeurs_departements1_idx');

            $table->index(["communes_id"], 'fk_demandeurs_communes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_demandeurs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('items_id', 'fk_demandeurs_items1_idx')
                ->references('id')->on('items')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('types_demandes_id', 'fk_demandeurs_types_demandes1_idx')
                ->references('id')->on('types_demandes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('courriers_id', 'fk_demandeurs_courriers1_idx')
                ->references('id')->on('courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('zones_id', 'fk_demandeurs_zones1_idx')
                ->references('id')->on('zones')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localites_id', 'fk_demandeurs_localites1_idx')
                ->references('id')->on('localites')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('arrondissements_id', 'fk_demandeurs_arrondissements1_idx')
                ->references('id')->on('arrondissements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_demandeurs_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('departements_id', 'fk_demandeurs_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('communes_id', 'fk_demandeurs_communes1_idx')
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
