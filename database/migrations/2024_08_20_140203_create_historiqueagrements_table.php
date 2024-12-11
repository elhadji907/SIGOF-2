<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public $tableName = 'historiqueagrements';

    public function up(): void
    {
        Schema::create('historiqueagrements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('commission')->nullable();
            $table->string('statut')->nullable();
            $table->longText('motif')->nullable();
            $table->unsignedInteger('validated_id');
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->unsignedInteger('commissionagrements_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            
            $table->index(["operateurs_id"], 'fk_historiqueagrements_operateurs1_idx');
            

            $table->foreign('operateurs_id', 'fk_historiqueagrements_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiqueagrements');
    }
};
