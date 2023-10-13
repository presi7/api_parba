<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsMissionManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_mission_managers', function (Blueprint $table) {
            $table->id();
            $table->string('Type_de_mission');
            $table->string('Etablissement');
            $table->string('Service');
            $table->dateTime('Date_et_Horaire');
            $table->string('Profil_recherche');
            $table->string('Motif');
            $table->string('Remplacant');
            $table->string('Personne_remplacee');


            // Clé étrangère vers la table missions_managers
            $table->unsignedBigInteger('missions_manager_id');
            $table->foreign('missions_manager_id')
                ->references('id')
                ->on('missions_managers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('details_mission_managers');
    }
}
