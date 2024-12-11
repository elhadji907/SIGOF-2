<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evaluations';

    /**
     * Run the migrations.
     * @table evaluations
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
            $table->string('name', 200);
            $table->dateTime('date')->nullable();
            $table->double('note')->nullable();
            $table->string('appreciation', 200)->nullable();
            $table->string('mention', 200)->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->unsignedInteger('evaluateurs_id')->nullable();

            $table->index(["formations_id"], 'fk_evaluations_formations1_idx');

            $table->index(["evaluateurs_id"], 'fk_evaluations_evaluateurs1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('formations_id', 'fk_evaluations_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('evaluateurs_id', 'fk_evaluations_evaluateurs1_idx')
                ->references('id')->on('evaluateurs')
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
