<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shift_id');
            $table->string('name');
            $table->integer('product_id')->index();
            $table->integer('quantity')->nullable();
            $table->integer('pfc_tank_id')->index();
            $table->integer('capacity');
			$table->integer('fuel_level');
			$table->integer('water_level');
            $table->integer('status');
            $table->integer('date');
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
        Schema::dropIfExists('tank_history');
    }
}
