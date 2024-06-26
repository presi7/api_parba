<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReseauManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseau_managers', function (Blueprint $table) {
            $table->id();
            $table->string('nom_de_la_personne_a_remplacer');
            $table->string('prenom_de_la_personne_a_remplacer');
            $table->string('service');
            $table->string('horaire');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('reseau_managers');
    }
}
