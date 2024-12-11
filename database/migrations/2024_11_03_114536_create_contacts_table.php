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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36);
            $table->longText('content')->nullable();
            $table->integer('commentable_id')->nullable();
            $table->longText('commentable_type')->nullable();
            $table->string('objet', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->longText('message')->nullable();
            $table->longText('reponse')->nullable();
            $table->string('statut', 50)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
