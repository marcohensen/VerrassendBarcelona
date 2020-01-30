<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFietsVerhuur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiets_verhuur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fietsId');
            $table->integer('userId');
            $table->string('fDatum');
            $table->string('fDagdeel');
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
        Schema::dropIfExists('fiets_verhuur');
    }
}
