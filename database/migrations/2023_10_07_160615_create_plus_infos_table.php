<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlusInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plus_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Structure');
            $table->string('Statut');
            $table->string('Matricule');
            $table->string('EtatProfil');
            $table->string('MetierEtCompetences');
            $table->boolean('AccepteJour')->default(false); // Champ booléen pour acceptation jour
            $table->boolean('AccepteNuit')->default(false); // Champ booléen pour acceptation nuit
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
        Schema::dropIfExists('plus_infos');
    }
}
