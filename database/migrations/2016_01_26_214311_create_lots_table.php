<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_lots', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('type_id');
            $table->integer('value');
            $table->integer('rent_min');
            $table->integer('rent_max');
            $table->date('start_date');
            $table->date('end_date')->nullable();
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
        Schema::drop('general_lots');
    }
}
