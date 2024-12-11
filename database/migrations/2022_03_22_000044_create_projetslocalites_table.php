<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetslocalitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projetslocalites';

    /**
     * Run the migrations.
     * @table projetslocalites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('projets_id');
            $table->unsignedInteger('localites_id');

            $table->index(["localites_id"], 'fk_projets_has_localites_localites1_idx');

            $table->index(["projets_id"], 'fk_projets_has_localites_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('projets_id', 'fk_projets_has_localites_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('localites_id', 'fk_projets_has_localites_localites1_idx')
                ->references('id')->on('localites')
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
