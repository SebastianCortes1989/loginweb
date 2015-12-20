<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_letters', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->integer('contract_id', false);
            $table->integer('employee_id', false);
            $table->integer('causal_id', false);
            $table->tinyInteger('certification', false);
            $table->date('notice_date', false);
            $table->date('settlement_date', false);
            $table->text('fact', false);
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
        Schema::drop('rrhh_letters');
    }
}
