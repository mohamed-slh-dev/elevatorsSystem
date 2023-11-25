<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceBillPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_bill_parts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            
            $table->bigInteger('maintenance_bill_id')->unsigned()->nullable();
            $table->foreign('maintenance_bill_id')->references('id')->on('maintenance_bills')->onDelete('cascade');

            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            
            $table->double('price', 11, 2)->nullable();
            $table->integer('quantity')->nullable();

            
            $table->bigInteger('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');


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
        Schema::dropIfExists('maintenance_bill_parts');
    }
}
