<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevatorPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elevator_parts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('elevator_id')->unsigned()->nullable();
            $table->foreign('elevator_id')->references('id')->on('elevators')->onDelete('cascade');


            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');

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
        Schema::dropIfExists('elevator_parts');
    }
}
