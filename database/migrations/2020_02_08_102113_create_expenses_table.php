<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration
{
  
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('expanse_categories_id')->unsigned();
            $table->string('amount')->nullable();
            $table->date('date')->nullable();
            $table->foreign('expanse_categories_id')->references('id')->on('expanse_categories')->onDelete('cascade')->onUpdate('cascade');
            });
    }

  
    public function down()
    {
        Schema::drop('expenses');
    }
}
