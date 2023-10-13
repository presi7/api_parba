<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileDePlusInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_de_plus_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Structure');
            $table->string('Statut');
            $table->string('Matricule');
            $table->string('EtatProfil');
            $table->string('MetierEtCompetences');
            $table->boolean('AccepteJour');
            $table->boolean('AccepteNuit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_de_plus_infos');
    }
}
