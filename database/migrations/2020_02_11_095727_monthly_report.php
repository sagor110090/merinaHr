<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MonthlyReport extends Migration
{
    
    public function up()
    {
        Schema::create('monthlyReports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->string('late')->nullable();
            $table->string('fine')->nullable();
            $table->string('salary')->nullable();
            $table->date('date')->nullable();
            });
    }

    
    public function down()
    {
        Schema::drop('monthlyReports');
    }
}
