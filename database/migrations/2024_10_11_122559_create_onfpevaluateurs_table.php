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
        Schema::create('onfpevaluateurs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('matricule', 200)->nullable();
            $table->string('name', 200);
            $table->string('initiale', 200);
            $table->string('telephone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('fonction', 200)->nullable();
            $table->string('specialite', 200)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('items1', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onfpevaluateurs');
    }
};
