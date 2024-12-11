<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projets';

    /**
     * Run the migrations.
     * @table projets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('name', 200)->nullable();
            $table->string('sigle', 200)->nullable();
            $table->string('type_projet')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('debut')->nullable();
            $table->dateTime('fin')->nullable();
            $table->timestamp('date_ouverture')->nullable();
            $table->timestamp('date_fermeture')->nullable();
            $table->double('budjet')->nullable();
            $table->longText('budjet_lettre')->nullable();
            $table->string('duree', 200)->nullable();
            $table->string('effectif', 200)->nullable();
            $table->string('statut', 200)->nullable();//ouvert, fermer
            $table->string('image', 200)->nullable();
            $table->string('convention_file', 200)->nullable();
            $table->string('type_localite')->nullable();
            $table->timestamp('date_signature')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
