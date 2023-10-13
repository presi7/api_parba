<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id'); // Clé étrangère vers la table "missions"
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
            $table->string('Personne remplacé');
            $table->timestamps();
        });

        Schema::table('mission_details', function (Blueprint $table) {
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mission_details');
    }
}
