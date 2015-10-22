<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_clients', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->string('rut', 15);
            $table->string('name', 100);
            $table->text('social_reason');
            $table->string('gyre', 255);
            $table->string('address', 255);
            $table->integer('region_id', false);
            $table->integer('city_id', false);
            $table->integer('commune_id', false);
            $table->integer('phone', false);
            $table->string('email', 100);
            $table->string('name_representative', 100);
            $table->string('rut_representative', 15);
            $table->integer('insurance_id', false);
            $table->integer('complementary_id', false);
            $table->integer('compensacion_id', false);
            $table->integer('mideplan', false);
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
        Schema::drop('general_clients');
    }
}

