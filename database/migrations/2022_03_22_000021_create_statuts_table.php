<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatutsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'statuts';

    /**
     * Run the migrations.
     * @table statuts
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
            $table->string('niveau', 200)->nullable();
            $table->string('details', 200)->nullable();
            $table->dateTime('date1')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('date2')->nullable();
            $table->unsignedInteger('formations_id')->nullable();
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
