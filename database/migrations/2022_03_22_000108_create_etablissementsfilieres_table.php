<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtablissementsfilieresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'etablissementsfilieres';

    /**
     * Run the migrations.
     * @table etablissementsfilieres
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('etablissements_id');
            $table->unsignedInteger('filieres_id');

            $table->index(["filieres_id"], 'fk_etablissements_has_filieres_filieres1_idx');

            $table->index(["etablissements_id"], 'fk_etablissements_has_filieres_etablissements1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('etablissements_id', 'fk_etablissements_has_filieres_etablissements1_idx')
                ->references('id')->on('etablissements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('filieres_id', 'fk_etablissements_has_filieres_filieres1_idx')
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
