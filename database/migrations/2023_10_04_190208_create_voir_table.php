<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->string('Type');
            $table->string('Etablissement');
            $table->string('Service');
            $table->string('Date Debut');
            $table->string('Date Fin');
            $table->string('Heure Debut');
            $table->string('Heure Fin');
            $table->string('Profil recherché');
            $table->string('Motif');
            $table->string('Remplacant');
            $table->string('Personne remplacée');
            $table->timestamps();

             // Ajoutez des contraintes de clé étrangère si nécessaire
             $table->foreign('mission_id')->references('id')->on('missions');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voir');
    }
}
