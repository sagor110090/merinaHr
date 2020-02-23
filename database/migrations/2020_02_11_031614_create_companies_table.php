<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
  
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->json('holidays')->nullable();
            $table->string('break_time')->nullable();
            $table->string('logo1')->nullable();
            $table->string('logo2')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('companies');
    }
}
