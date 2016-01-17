<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhCcafQuotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_ccaf_quotas', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('contract_id');
            $table->integer('employee_id');
            $table->integer('ccaf_id');
            $table->integer('number');
            $table->float('ammount');
            $table->integer('month');
            $table->integer('year');
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
        Schema::drop('rrhh_ccaf_quotas');
    }
}
