<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionNouvelusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscription_nouvelusers', function (Blueprint $table) {
            $table->id();
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('N° Telephone');
            $table->string('Email')->unique();
            $table->string('Code Structure');
            $table->string('Mot de passe');
            $table->string('Confirmer mot de passe');
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
        Schema::dropIfExists('inscription_nouvelusers');
    }
}
