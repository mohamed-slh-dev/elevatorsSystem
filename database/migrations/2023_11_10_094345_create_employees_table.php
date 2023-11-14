<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('identity_type')->nullable();
            $table->string('identity_number')->nullable();
             
            $table->bigInteger('nationality_id')->unsigned()->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');

            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();


            
            $table->bigInteger('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->bigInteger('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');

            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->bigInteger('neighbor_id')->unsigned()->nullable();
            $table->foreign('neighbor_id')->references('id')->on('neighbors')->onDelete('cascade');



            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('bank_account')->nullable();
            $table->string('iban')->nullable();


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
        Schema::dropIfExists('employees');
    }
}
