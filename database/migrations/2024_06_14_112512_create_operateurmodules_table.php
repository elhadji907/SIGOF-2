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
        Schema::create('operateurmodules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->char('uuid', 36);
            $table->string('module')->nullable();
            $table->string('domaine')->nullable();
            $table->string('categorie')->nullable();
            $table->string('niveau_qualification')->nullable();
            $table->longText('motif')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
            
            $table->index(["operateurs_id"], 'fk_operateurmodules_operateurs1_idx');
            

            $table->foreign('operateurs_id', 'fk_operateurmodules_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');
            
            $table->index(["users_id"], 'fk_operateurmodules_users1_idx');
            

            $table->foreign('users_id', 'fk_operateurmodules_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operateurmodules');
    }
};
