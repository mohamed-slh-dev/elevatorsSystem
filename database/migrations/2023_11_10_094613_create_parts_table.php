<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('nationality_id')->unsigned()->nullable();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');

            
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->string('desc')->nullable();
            $table->string('usage')->nullable();
            $table->double('quantity', 11, 2)->nullable();
            $table->double('consumed_quantity', 11, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('parts');
    }
}
