<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_savings', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->integer('employee_id', false);
            $table->integer('ammount', false);
            $table->integer('entity_id', false);
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
        Schema::drop('rrhh_savings');
    }
}
