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
            $table->unsignedBigInteger('missions_manager_id')->default(1); // Remplacez 1 par la valeur par défaut souhaitée
            $table->string('type');
            $table->string('structure');
            $table->string('service');
            $table->date('debut');
            $table->date('fin');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('profil');
            $table->string('motif');
            $table->string('nom_de_la_personne_a_remplacer');
            $table->string('prenom_de_la_personne_a_remplacer');
            $table->timestamps();


            // Ajoutez la définition de la clé étrangère
            // $table->foreign('missions_manager_id')->nullable()->unsigned()
            // ->references('id')
            // ->on('missions_managers')
            // ->onDelete('cascade'); // Vous pouvez spécifier onDelete comme nécessaire
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
