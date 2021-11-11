<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('product_id')->index();
            $table->integer('quantity')->nullable();
            $table->integer('pfc_tank_id')->index();
            $table->integer('capacity');
			$table->integer('fuel_level');
			$table->integer('water_level');
            $table->integer('alarm_email_water_level')->deafult('0');
            $table->integer('low_limit')->deafult('0');
            $table->integer('status');
            $table->integer('created_at');
            $table->integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanks');
    }
}
