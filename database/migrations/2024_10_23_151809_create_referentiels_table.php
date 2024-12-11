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
        Schema::create('referentiels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->longText('intitule')->nullable();
            $table->string('titre', 200)->nullable();
            $table->string('categorie', 200)->nullable();
            $table->longText('reference')->nullable();
            $table->timestamp('date_publication')->nullable();
            $table->timestamp('date_revision')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('conventions_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referentiels');
    }
};
