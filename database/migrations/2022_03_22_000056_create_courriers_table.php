<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourriersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'courriers';

    /**
     * Run the migrations.
     * @table courriers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero', 200)->nullable();
            $table->longText('objet')->nullable();
            $table->string('expediteur', 200)->nullable();
            $table->string('numero_reponse', 200)->nullable();
            $table->string('annee', 200)->nullable();
            $table->longText('description')->nullable();
            $table->longText('reference')->nullable();
            $table->longText('message')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('fax', 200)->nullable();
            $table->string('bp', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('file', 200)->nullable();
            $table->string('legende', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('adresse', 200)->nullable();
            $table->timestamp('date_imp')->nullable();
            $table->timestamp('date_depart')->nullable();
            $table->timestamp('date_recep')->nullable();
            $table->timestamp('date_cores')->nullable();
            $table->timestamp('date_rejet')->nullable();
            $table->timestamp('date_liq')->nullable();
            $table->timestamp('date_reponse')->nullable();
            $table->longText('designation')->nullable();
            $table->longText('observation')->nullable();
            $table->timestamp('date_visa')->nullable();
            $table->timestamp('date_mandat')->nullable();
            $table->double('tva')->nullable();
            $table->double('ir')->nullable();
            $table->string('nb_pc', 45)->nullable();
            $table->string('destinataire', 200)->nullable();
            $table->string('type', 200)->nullable();
            $table->timestamp('date_paye')->nullable();
            $table->string('num_bord',200)->nullable();
            $table->double('montant')->nullable();
            $table->double('autres_montant')->nullable();
            $table->double('total')->nullable();
            $table->double('user_create_id'); // For l'utilisateur qui a créé le courrier;
            $table->double('user_update_id'); // For l'utilisateur qui a modifié le courrier;
            $table->unsignedInteger('users_id')->nullable();
            $table->unsignedInteger('types_courriers_id')->nullable();
            $table->unsignedInteger('projets_id')->nullable();
            $table->unsignedInteger('traitementcourriers_id')->nullable();

            $table->index(["users_id"], 'fk_courriers_users1_idx');

            $table->index(["types_courriers_id"], 'fk_courriers_types_courriers1_idx');

            $table->index(["projets_id"], 'fk_courriers_projets1_idx');

            $table->index(["traitementcourriers_id"], 'fk_courriers_traitementcourriers1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_courriers_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('types_courriers_id', 'fk_courriers_types_courriers1_idx')
                ->references('id')->on('types_courriers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('projets_id', 'fk_courriers_projets1_idx')
                ->references('id')->on('projets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('traitementcourriers_id', 'fk_courriers_traitementcourriers1_idx')
                ->references('id')->on('traitementcourriers')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
