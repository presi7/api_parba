<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mes_missions', function (Blueprint $table) {
            $table->id();
            $table->string('Reference');
            $table->date('Date');
            $table->time('Debut');
            $table->time('Fin');
            $table->string('Structure');
            $table->string('Service');
            $table->string('Etat');
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
        Schema::dropIfExists('mes_missions');
    }
}
