<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToRrhhContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rrhh_contracts', function($table){
            $table->integer('base');
            $table->integer('collation');
            $table->integer('liquid');
            $table->integer('mobilization');
            $table->integer('tools');
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
        Schema::table('rrhh_contracts', function($table){
            $table->dropColumn('base');
            $table->dropColumn('collation');
            $table->dropColumn('liquid');
            $table->dropColumn('mobilization');
            $table->dropColumn('tools');
        });
    }
}
