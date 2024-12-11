<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesprogrammesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'collectivesprogrammes';

    /**
     * Run the migrations.
     * @table collectivesprogrammes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('collectives_id');
            $table->unsignedInteger('programmes_id');

            $table->index(["programmes_id"], 'fk_collectives_has_programmes_programmes1_idx');

            $table->index(["collectives_id"], 'fk_collectives_has_programmes_collectives1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('collectives_id', 'fk_collectives_has_programmes_collectives1_idx')
                ->references('id')->on('collectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_collectives_has_programmes_programmes1_idx')
                ->references('id')->on('programmes')
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
