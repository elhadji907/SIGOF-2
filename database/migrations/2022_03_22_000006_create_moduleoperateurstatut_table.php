<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleoperateurstatutTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'moduleoperateurstatut';

    /**
     * Run the migrations.
     * @table moduleoperateurstatut
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('statut', 200)->nullable();
            $table->string('motif', 200)->nullable();
            $table->unsignedInteger('operateurmodules_id');
            $table->unsignedInteger('validated_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
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
