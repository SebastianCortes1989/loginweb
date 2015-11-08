<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralCharges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_charges', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->string('name', 20);
            $table->integer('management_id', false);
            $table->integer('unit_id', false);
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
        Schema::drop('general_charges');
    }
}
