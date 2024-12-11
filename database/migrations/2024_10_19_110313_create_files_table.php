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
        Schema::create('files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('legende', 200)->nullable();
            $table->string('sigle', 200)->nullable();
            $table->string('file', 200)->nullable();
            $table->string('cin', 200)->nullable();
            $table->string('cin_recto', 200)->nullable();
            $table->string('cin_verso', 200)->nullable();
            $table->string('residence', 200)->nullable();
            $table->string('diplome_academique', 200)->nullable();
            $table->string('diplome_professionnel', 200)->nullable();
            $table->string('autre_diplome', 200)->nullable();
            $table->string('attestation', 200)->nullable();
            $table->string('acte_creation', 200)->nullable();
            $table->string('bulletins', 200)->nullable();
            $table->string('cv', 200)->nullable();
            $table->string('autre', 200)->nullable();
            $table->unsignedInteger('operateurs_id')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('pcharges_id')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(["operateurs_id"], 'fk_files_operateurs1_idx');
            $table->index(["users_id"], 'fk_files_users1_idx');
            $table->index(["pcharges_id"], 'fk_files_pcharges1_idx');

            $table->foreign('operateurs_id', 'fk_files_operateurs1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_files_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pcharges_id', 'fk_files_pcharges1_idx')
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
        Schema::dropIfExists('files');
    }
};
