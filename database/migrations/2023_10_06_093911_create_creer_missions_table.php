<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreerMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creer_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('missions_manager_id');
            $table->string('Type');
            $table->string('Structure');
            $table->string('Service');
            $table->date('Debut');
            $table->date('Fin');
            $table->time('Heure_de_Debut');
            $table->time('Heure_de_Fin');
            $table->string('Profil');
            $table->string('Motif');
            $table->string('Nom_de_la_personne_a_remplacer');
            $table->string('Prenom_de_la_personne_a_remplacer');
            $table->timestamps();

            // Ajoutez la définition de la clé étrangère
            $table->foreign('missions_manager_id')
            ->references('id')
            ->on('missions_managers')
            ->onDelete('cascade'); // Vous pouvez spécifier onDelete comme nécessaire
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creer_missions');
    }
}
