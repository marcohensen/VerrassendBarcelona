<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourVerhuur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_verhuur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tourId');
            $table->integer('userId');
            $table->string('tDatum');
            $table->string('tDagdeel');
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
        Schema::dropIfExists('tour_verhuur');
    }
}
