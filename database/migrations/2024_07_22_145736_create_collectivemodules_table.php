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
        Schema::create('collectivemodules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('numero')->nullable();
            $table->string('module')->nullable();
            $table->string('domaine')->nullable();
            $table->string('niveau_qualification')->nullable();
            $table->longText('motif')->nullable();
            $table->longText('adresse')->nullable();
            $table->string('contact')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedInteger('collectives_id')->nullable();
            $table->unsignedInteger('departements_id')->nullable();
            $table->unsignedInteger('regions_id')->nullable();
            $table->unsignedInteger('formations_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(["collectives_id"], 'fk_collectivemodules_collectives1_idx');
            
            $table->index(["formations_id"], 'fk_collectivemodules_formations1_idx');

            $table->foreign('collectives_id', 'fk_collectivemodules_collectives1_idx')
                ->references('id')->on('collectives')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index(["departements_id"], 'fk_collectivemodules_departements1_idx');

            $table->foreign('departements_id', 'fk_collectivemodules_departements1_idx')
                ->references('id')->on('departements')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->index(["regions_id"], 'fk_collectivemodules_regions1_idx');

            $table->foreign('regions_id', 'fk_collectivemodules_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onUpdate('no action');
                
            $table->foreign('formations_id', 'fk_collectivemodules_formations1_idx')
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
        Schema::dropIfExists('collectivemodules');
    }
};
