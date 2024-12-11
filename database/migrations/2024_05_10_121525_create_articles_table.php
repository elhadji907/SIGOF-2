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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->char('uuid', 36);
            $table->longText('name');
            $table->unsignedInteger('employees_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
            
        $table->index(["employees_id"], 'fk_articles_employees1_idx');

        $table->foreign('employees_id', 'fk_articles_employees1_idx')
        ->references('id')->on('employees')
        ->onDelete('no action')
        ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
