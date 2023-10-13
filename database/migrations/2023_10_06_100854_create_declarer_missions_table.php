<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarerMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarer_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('missions_manager_id');
            $table->string('Etablissement');
            $table->string('Type');
            $table->date('Date_de_Debut');
            $table->date('Date_de_Fin');
            $table->time('Heure_de_debut');
            $table->time('Heure_de_Fin');
            $table->string('Profil_recherche');
            $table->string('Motif');
            $table->string('Remplacant_selectionne');
            $table->timestamps();

              // Clé étrangère vers MissionsManager
            $table->foreign('missions_manager_id')
            ->references('id')
            ->on('missions_managers')
            ->onDelete('cascade'); // Vous pouvez spécifier onDelete comme nécessaire
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('declarer_missions');
    }
}
