<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration
{
  
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->date('starting_date')->nullable();
            $table->date('ending_date')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('schedules');
    }
}
