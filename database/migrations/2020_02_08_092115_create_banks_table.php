<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration
{
  
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_Id')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('banks');
    }
}
