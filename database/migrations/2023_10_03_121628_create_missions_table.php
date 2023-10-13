<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->String('NumMission');
            $table->String('Date');
            $table->String('Pourvue ou non');
            $table->String('Annulé ou non');
            $table->String('Administrateur');
            $table->String('Remplacant');
            $table->String('Etablissement');
            $table->String('Service');
            $table->String('Choix du metier');
            $table->String('Jour/Nuit');
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
        Schema::dropIfExists('missions');
    }
}
