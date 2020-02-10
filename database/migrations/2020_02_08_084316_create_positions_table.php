<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePositionsTable extends Migration
{
  
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('position')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('positions');
    }
}
