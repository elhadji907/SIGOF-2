<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('cin', 200)->nullable();
            $table->string('civilite')->nullable(true);
            $table->longText('firstname')->nullable(true);
            $table->string('name', 200)->nullable(true);
            $table->string('username', 200)->nullable(true);
            $table->string('email', 200)->nullable(true);
            $table->string('telephone', 200)->nullable(true);
            $table->string('telephone_secondaire', 200)->nullable(true);
            $table->string('telephone_parent', 200)->nullable(true);
            $table->string('fixe', 200)->nullable(true);
            $table->dateTime('date_naissance')->nullable(true);
            $table->string('lieu_naissance', 200)->nullable(true);
            $table->longText('adresse')->nullable(true);
            $table->string('bp', 200)->nullable(true);
            $table->string('fax', 200)->nullable(true);
            $table->string('file_cin', 200)->nullable(true);
            $table->string('file_diplome', 200)->nullable(true);
            $table->timestamp('email_verified_at')->nullable(true);
            $table->string('password')->nullable(true);
            $table->string('image', 200)->nullable(true);
            $table->string('created_by', 200)->nullable(true);
            $table->string('updated_by', 200)->nullable(true);
            $table->string('deleted_by', 200)->nullable(true);
            $table->string('twitter', 200)->nullable(true);
            $table->string('facebook', 200)->nullable(true);
            $table->string('instagram', 200)->nullable(true);
            $table->string('linkedin', 200)->nullable(true);
            /* 1->employe; 2->sans emploi; 3->informel; 4->etudiant; 5->eleve; 6->autre */
            /* $table->enum('situation_professionnelle', ['', 'Employé', 'Sans emploi', 'Informel', 'Etudiant', 'Eleve', 'Autre']); */
            $table->string('situation_professionnelle')->nullable(true);
            /*  1->marié; 2->celibataire; 3->veuf(ve); 4->divorsé */
            /* $table->enum('situation_familiale', ['', 'Marié(e)', 'Célibataire', 'Veuf(ve)', 'Divorsé(e)']); */
            $table->string('situation_familiale')->nullable(true);
            
            $table->string('operateur', 200)->nullable();
            $table->string('web', 200)->nullable();
            $table->string('typestructure', 200)->nullable();
            $table->string('categorie', 200)->nullable();
            $table->string('ninea', 200)->nullable();
            $table->string('rccm', 200)->nullable();
            $table->string('statut', 200)->nullable();
            $table->string('autre_statut', 200)->nullable();
            $table->string('email_responsable', 200)->nullable();
            $table->string('fonction_responsable', 200)->nullable();

            $table->rememberToken();

            $table->unique(["email"], 'email_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();
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
