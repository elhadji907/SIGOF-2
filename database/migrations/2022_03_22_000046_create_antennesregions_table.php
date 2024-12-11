<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntennesregionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'antennesregions';

    /**
     * Run the migrations.
     * @table antennesregions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('antennes_id');
            $table->unsignedInteger('regions_id');

            $table->index(["regions_id"], 'fk_antennes_has_regions_regions1_idx');

            $table->index(["antennes_id"], 'fk_antennes_has_regions_antennes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('antennes_id', 'fk_antennes_has_regions_antennes1_idx')
                ->references('id')->on('antennes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_antennes_has_regions_regions1_idx')
                ->references('id')->on('regions')
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
