<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetszonesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projetszones';

    /**
     * Run the migrations.
     * @table projetszones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('projets_id');
            $table->unsignedInteger('zones_id');

            $table->index(["zones_id"], 'fk_projets_has_zones_zones1_idx');

            $table->index(["projets_id"], 'fk_projets_has_zones_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('projets_id', 'fk_projets_has_zones_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('zones_id', 'fk_projets_has_zones_zones1_idx')
                ->references('id')->on('zones')
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
