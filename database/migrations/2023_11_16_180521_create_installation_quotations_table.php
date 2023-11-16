<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallationQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installation_quotations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            

            $table->bigInteger('elevator_id')->unsigned()->nullable();
            $table->foreign('elevator_id')->references('id')->on('elevators')->onDelete('cascade');
            
            $table->double('price', 11, 2)->nullable();

            $table->date('date')->nullable();
            $table->string('reference')->nullable();


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
        Schema::dropIfExists('installation_quotations');
    }
}
