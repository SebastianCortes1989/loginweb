<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_loans', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->integer('contract_id', false);
            $table->integer('employee_id', false);
            $table->integer('day', false);
            $table->integer('month', false);
            $table->integer('year', false);
            $table->integer('type_id', false);
            $table->integer('quotas', false);
            $table->integer('ammount', false);
            $table->date('grant_date');
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
        Schema::drop('rrhh_loans');
    }
}
