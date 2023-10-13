<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionRemplacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription_remplacants', function (Blueprint $table) {
            $table->id();
            $table->string('Structure');
            $table->string('Statut');
            $table->string('Metiers');
            $table->string('Competences');
            $table->string('Jour');
            $table->string('Nuit');
            $table->unsignedBigInteger('nouveluser_id'); // Champ pour la clé étrangère
            $table->timestamps();

            // Clé étrangère vers la table "inscription_nouvelusers"
            $table->foreign('nouveluser_id')->references('id')->on('inscription_nouvelusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscription_remplacants');
    }
}
