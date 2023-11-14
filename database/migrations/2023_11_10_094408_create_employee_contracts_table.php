<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');


            $table->bigInteger('job_title_id')->unsigned()->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');

            $table->date('date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('salary', 11, 2)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('employee_contracts');
    }
}
