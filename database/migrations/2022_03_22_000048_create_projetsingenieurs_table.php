<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsingenieursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projetsingenieurs';

    /**
     * Run the migrations.
     * @table projetsingenieurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('projets_id');
            $table->unsignedInteger('ingenieurs_id');

            $table->index(["ingenieurs_id"], 'fk_projets_has_ingenieurs_ingenieurs1_idx');

            $table->index(["projets_id"], 'fk_projets_has_ingenieurs_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('projets_id', 'fk_projets_has_ingenieurs_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ingenieurs_id', 'fk_projets_has_ingenieurs_ingenieurs1_idx')
                ->references('id')->on('ingenieurs')
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
