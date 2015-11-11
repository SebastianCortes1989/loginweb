<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContractsJournals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rrhh_contracts_journals', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('contract_id', false);
            $table->integer('day_start', false);
            $table->integer('day_end', false);
            $table->time('hour_start');
            $table->time('hour_end');
            $table->integer('collation', false);
            $table->integer('hours', false);
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
        Schema::drop('rrhh_contracts_journals');
    }
}

