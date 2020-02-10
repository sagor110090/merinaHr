<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeePersonalInfosTable extends Migration
{
  
    public function up()
    {
        Schema::create('employee_personal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('picture')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('file')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('employee_personal_infos');
    }
}
