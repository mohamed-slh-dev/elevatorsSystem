<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_bills', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');


            $table->bigInteger('elevator_id')->unsigned()->nullable();
            $table->foreign('elevator_id')->references('id')->on('elevators')->onDelete('cascade');
            

            // :report information
            $table->string('elevator_type')->nullable();
            $table->string('elevator_opening_mechanism')->nullable();
            $table->string('elevator_operating_mechanism')->nullable();
            $table->string('elevator_power')->nullable();

            $table->integer('elevator_passengers')->nullable();
            $table->integer('elevator_count')->nullable();
            $table->integer('elevator_floors')->nullable();
            $table->integer('elevator_doors')->nullable();

            $table->double('elevator_load', 11, 2)->nullable();
            $table->double('elevator_speed', 11, 2)->nullable();
            // :end reports information


            
            $table->double('price', 11, 2)->nullable();
            $table->string('desc')->nullable();

            $table->date('date')->nullable();

            $table->string('status')->nullable();
            $table->string('status_alt')->nullable();
            
            $table->string('reference')->nullable();
            


            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



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
        Schema::dropIfExists('maintenance_bills');
    }
}
