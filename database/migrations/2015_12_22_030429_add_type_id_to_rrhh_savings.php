<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeIdToRrhhSavings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rrhh_savings', function(Blueprint $table){
            $table->dropColumn('entity_id');
            $table->integer('type_id');
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
        Schema::table('rrhh_savings', function(Blueprint $table){
            $table->integer('entity_id');
            $table->dropColumn('type_id');
        });
    }
}
