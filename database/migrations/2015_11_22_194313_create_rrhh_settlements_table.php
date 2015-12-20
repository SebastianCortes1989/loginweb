<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_settlements', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->integer('contract_id', false);
            $table->integer('employee_id', false);
            $table->integer('causal_id', false);
            $table->date('date', false);
            $table->integer('proportional_holidays', false);
            $table->integer('substitute_compensation', false);
            $table->integer('service_years', false);
            $table->integer('substitute_voluntary', false);
            $table->integer('substitute_agreed', false);
            $table->integer('legal_holidays', false);
            $table->integer('afc', false);
            $table->integer('compensacion_loans', false);
            $table->integer('petty_cash', false);
            $table->integer('discounts_others', false);
            $table->integer('severals', false);
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
        Schema::drop('rrhh_settlements');
    }
}
