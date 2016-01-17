<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhLoanQuotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_loans_quotas', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('contract_id');
            $table->integer('employee_id');
            $table->integer('loan_id');
            $table->integer('number');
            $table->float('ammount');
            $table->date('date');
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
        Schema::drop('rrhh_loans_quotas');
    }
}
