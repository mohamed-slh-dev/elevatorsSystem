<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallationBillPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installation_bill_parts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('installation_bill_id')->unsigned()->nullable();
            $table->foreign('installation_bill_id')->references('id')->on('installation_bills')->onDelete('cascade');

            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            
            $table->double('price', 11, 2)->nullable();


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
        Schema::dropIfExists('installation_bill_parts');
    }
}
