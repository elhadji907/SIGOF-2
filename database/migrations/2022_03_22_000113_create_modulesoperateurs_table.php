<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesoperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'modulesoperateurs';

    /**
     * Run the migrations.
     * @table modulesoperateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('modules_id');
            $table->unsignedInteger('operateurs_id');
            $table->unsignedInteger('moduleoperateurstatut_id')->nullable();
            $table->longText('specialites')->nullable();

            $table->index(["operateurs_id"], 'fk_modules_has_operateurs_operateurs1_idx');

            $table->index(["modules_id"], 'fk_modules_has_operateurs_modules1_idx');

            $table->index(["moduleoperateurstatut_id"], 'fk_modulesoperateurs_moduleoperateurstatut1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('modules_id', 'fk_modules_has_operateurs_modules1_idx')
                ->references('id')->on('modules')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('operateurs_id', 'fk_modules_has_operateurs_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('moduleoperateurstatut_id', 'fk_modulesoperateurs_moduleoperateurstatut1_idx')
                ->references('id')->on('moduleoperateurstatut')
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
