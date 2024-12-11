<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFcollectivesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'fcollectives';

    /**
     * Run the migrations.
     * @table fcollectives
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('code', 200);
            $table->string('categorie', 200)->nullable();
            $table->string('statut')->nullable();
            $table->unsignedInteger('formations_id');
            $table->unsignedInteger('modules_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('programmes_id')->nullable();

            $table->index(["formations_id"], 'fk_formations_collectives_formations1_idx');

            $table->index(["modules_id"], 'fk_fcollectives_modules1_idx');

            $table->index(["projets_id"], 'fk_fcollectives_projets1_idx');

            $table->index(["programmes_id"], 'fk_fcollectives_programmes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_formations_collectives_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modules_id', 'fk_fcollectives_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_fcollectives_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('programmes_id', 'fk_fcollectives_programmes1_idx')
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
