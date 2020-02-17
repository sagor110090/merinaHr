<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeavesTable extends Migration
{
  
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('employee_id')->unsigned();
            $table->string('application')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->date('date')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('leaves');
    }
}
