<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilierespecialitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'filierespecialites';

    /**
     * Run the migrations.
     * @table filierespecialites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200);
            $table->string('domaine', 200)->nullable();
            $table->unsignedInteger('filieres_id')->nullable();

            $table->index(["filieres_id"], 'fk_filierespecialites_filieres1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('filieres_id', 'fk_filierespecialites_filieres1_idx')
                ->references('id')->on('filieres')
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
