<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeighborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighbors', function (Blueprint $table) {
            $table->id();

            $table->string('name_ar')->nullable();
            $table->string('name_eng')->nullable();

            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->bigInteger('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');


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
        Schema::dropIfExists('neighbors');
    }
}
