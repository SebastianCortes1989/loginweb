<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_units', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->string('name', 20);
            $table->integer('management_id', false);
            $table->integer('employee_id', false);
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
        Schema::drop('general_units');        
    }
}
