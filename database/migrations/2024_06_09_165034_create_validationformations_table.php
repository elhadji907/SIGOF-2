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
        Schema::create('validationformations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->unsignedInteger('validated_id');
            $table->string('action', 50)->nullable();
            $table->longText('motif')->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            
            $table->index(["formations_id"], 'fk_validationformations_formations1_idx');
            

            $table->foreign('formations_id', 'fk_validationformations_formations1_idx')
                ->references('id')->on('formations')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validationformations');
    }
};
