<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('general_employees', function($table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id', false);
            $table->string('name', 255);
            $table->string('rut', 15);
            $table->date('birthday');
            $table->string('address', 255);
            $table->mediumInteger('phone', false, 15);
            $table->mediumInteger('movil_phone', false, 15);
            $table->integer('nacionality_id', false);
            $table->integer('city_id', false);
            $table->integer('commune_id', false);
            $table->mediumInteger('passport', false, 20);
            $table->integer('type_id', false);
            $table->integer('afc_id', false);
            $table->integer('apv_id', false);
            $table->integer('afp_id', false);
            $table->integer('bank_id', false);
            $table->integer('account_type_id', false);
            $table->mediumInteger('account_number', false, 30);
            $table->integer('health_id', false);
            $table->mediumInteger('ges', false, 20);
            $table->mediumInteger('plan_value', false, 10);
            $table->integer('family_charge_id', false);
            $table->smallInteger('familiars', false, 5);
            $table->smallInteger('maternals', false, 5);
            $table->smallInteger('invalids', false, 5);
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
        Schema::drop('general_employees');
    }
}
