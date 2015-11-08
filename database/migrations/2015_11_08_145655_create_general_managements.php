<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralManagements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_managements', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->string('name', 20);
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
        Schema::drop('general_managements');
    }
}
