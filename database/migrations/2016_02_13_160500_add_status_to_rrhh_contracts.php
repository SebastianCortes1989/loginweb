<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToRrhhContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rrhh_contracts', function(Blueprint $table){
            $table->enum('status', ['Vigente', 'Finiquitado'])->default('Vigente');
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
        Schema::table('rrhh_contracts', function(Blueprint $table){
            $table->dropColumn('status');
        });
    }
}
