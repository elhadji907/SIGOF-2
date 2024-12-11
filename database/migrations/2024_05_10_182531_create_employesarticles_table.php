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
        Schema::create('employesarticles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('employes_id');
            $table->unsignedInteger('articles_id');

            $table->index(["articles_id"], 'fk_employesarticles_articles1_idx');

            $table->index(["employes_id"], 'fk_employesarticles_employes1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employesarticles');
    }
};
