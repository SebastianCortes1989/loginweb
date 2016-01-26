<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_tops', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->float('value');
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
        Schema::drop('general_tops');        
    }
}
