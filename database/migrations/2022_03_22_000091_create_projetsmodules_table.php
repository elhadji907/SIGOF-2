<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsmodulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projetsmodules';

    /**
     * Run the migrations.
     * @table projetsmodules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('projets_id');
            $table->unsignedInteger('modules_id');

            $table->index(["modules_id"], 'fk_projets_has_modules_modules1_idx');

            $table->index(["projets_id"], 'fk_projets_has_modules_projets1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('projets_id', 'fk_projets_has_modules_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_projets_has_modules_modules1_idx')
                ->references('id')->on('modules')
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
