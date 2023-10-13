<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions_managers', function (Blueprint $table) {
            $table->id();
            $table->string('NumMission');
            $table->date('Date');
            $table->boolean('PourvueOuNon');
            $table->boolean('AnnuleOuNon');
            $table->string('Administrateur');
            $table->string('Remplacant');
            $table->string('Etablissement');
            $table->string('Service');
            $table->string('ChoixDuMetier');
            $table->string('JourNuit');
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
        Schema::dropIfExists('missions_managers');
    }
}
