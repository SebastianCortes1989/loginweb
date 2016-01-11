<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPercentajeToRrhhExtrahoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rrhh_extra_hours', function(Blueprint $table)
        {
            $table->integer('percentaje');
            $table->dropColumn('percentaje_id');
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
        Schema::table('rrhh_extra_hours', function(Blueprint $table)
        {
            $table->integer('percentaje_id');
            $table->dropColumn('percentaje');
        });
    }
}
