<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalariesTable extends Migration
{
  
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('amount')->nullable();
            $table->string('fine')->nullable();
            $table->string('month')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->date('date')->nullable();
            $table->integer('bank_id')->unsigned();
            $table->string('chcek_no')->nullable();
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('salaries');
    }
}
