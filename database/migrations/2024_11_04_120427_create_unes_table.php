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
        Schema::create('unes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('titre1', 200)->nullable();
            $table->string('titre2', 200)->nullable();
            $table->string('image', 200)->nullable();
            $table->longText('message')->nullable();
            $table->string('status', 200)->nullable(); /* à la une */
            $table->unsignedInteger(column: 'users_id')->nullable(); /* auth user id */
            $table->string('video', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unes');
    }
};
