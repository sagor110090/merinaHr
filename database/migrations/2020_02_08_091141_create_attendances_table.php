<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendancesTable extends Migration
{
  
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('employee_id')->unsigned();
            $table->time('attendance')->nullable();
            $table->string('late')->nullable();
            $table->date('date')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('attendances');
    }
}
