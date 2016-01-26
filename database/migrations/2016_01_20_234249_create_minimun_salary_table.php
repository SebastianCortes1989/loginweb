<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinimunSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_minimun_salary', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('value');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('general_minimun_salary');
    }
}
