<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courrierarrivesemployes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('employees_id');
            $table->unsignedInteger('arrives_id');
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(["arrives_id"], 'fk_employeesarrives_arrives1_idx');

            $table->index(["employees_id"], 'fk_employeesarrives_employees1_idx');


            $table->foreign('employees_id', 'fk_employeesarrives_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('arrives_id', 'fk_employeesarrives_arrives1_idx')
                ->references('id')->on('arrives')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrierarrivesemployes');
    }
};
