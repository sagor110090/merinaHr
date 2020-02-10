<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpanseCategoriesTable extends Migration
{
  
    public function up()
    {
        Schema::create('expanse_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('category_name')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('expanse_categories');
    }
}
