<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeszonesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'programmeszones';

    /**
     * Run the migrations.
     * @table programmeszones
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('programmes_id');
            $table->unsignedInteger('zones_id');

            $table->index(["zones_id"], 'fk_programmes_has_zones_zones1_idx');

            $table->index(["programmes_id"], 'fk_programmes_has_zones_programmes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('programmes_id', 'fk_programmes_has_zones_programmes1_idx')
                ->references('id')->on('programmes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('zones_id', 'fk_programmes_has_zones_zones1_idx')
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
