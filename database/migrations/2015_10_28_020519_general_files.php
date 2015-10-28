<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_files', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('size');
            $table->string('name', 100);
            $table->string('mime');
            $table->string('filename');
            $table->integer('author_id');
            $table->integer('imageable_id');
            $table->string('imageable_type', 255);
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
        Schema::drop('general_files');
    }
}
