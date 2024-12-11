<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesprojetsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'collectivesprojets';

    /**
     * Run the migrations.
     * @table collectivesprojets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('collectives_id');
            $table->unsignedInteger('projets_id');

            $table->index(["projets_id"], 'fk_collectives_has_projets_projets1_idx');

            $table->index(["collectives_id"], 'fk_collectives_has_projets_collectives1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('collectives_id', 'fk_collectives_has_projets_collectives1_idx')
                ->references('id')->on('collectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_collectives_has_projets_projets1_idx')
                ->references('id')->on('projets')
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
