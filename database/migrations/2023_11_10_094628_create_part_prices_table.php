<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_prices', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');

            $table->double('purchase_price', 11, 2)->nullable();
            $table->double('sell_price', 11, 2)->nullable();

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
        Schema::dropIfExists('part_prices');
    }
}
