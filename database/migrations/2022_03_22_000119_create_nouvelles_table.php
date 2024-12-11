<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNouvellesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nouvelles';

    /**
     * Run the migrations.
     * @table nouvelles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('items', 200);
            $table->dateTime('date')->nullable();
            $table->unsignedInteger('pcharges_id');

            $table->index(["pcharges_id"], 'fk_nouvelles_pcharges1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('pcharges_id', 'fk_nouvelles_pcharges1_idx')
                ->references('id')->on('pcharges')
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
