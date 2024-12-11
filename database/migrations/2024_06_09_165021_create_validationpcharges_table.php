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
        Schema::create('validationpcharges', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->unsignedInteger('validated_id');
            $table->string('action', 50)->nullable();
            $table->longText('motif')->nullable();
            $table->unsignedInteger('pcharges_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            
            $table->index(["pcharges_id"], 'fk_validationpcharges_pcharges1_idx');
            

            $table->foreign('pcharges_id', 'fk_validationpcharges_pcharges1_idx')
                ->references('id')->on('pcharges')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validationpcharges');
    }
};
