<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceQuotationPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_quotation_parts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();

            $table->bigInteger('maintenance_quotation_id')->unsigned()->nullable();
            $table->foreign('maintenance_quotation_id')->references('id')->on('maintenance_quotations')->onDelete('cascade');

            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
            
            $table->double('price', 11, 2)->nullable();
            $table->integer('quantity')->nullable();



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
        Schema::dropIfExists('maintenance_quotation_parts');
    }
}
