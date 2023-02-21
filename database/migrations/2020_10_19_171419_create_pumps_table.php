<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->integer('tank_id')->nullable();
			$table->integer('nozzle_id')->nullable();
			$table->integer('channel_id')->nullable();
			$table->integer('starting_totalizer')->nullable();
			$table->integer('current_tot')->nullable();
			$table->integer('current_tot_eur')->nullable();
			$table->integer('pfc_id')->nullable();
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
        Schema::dropIfExists('pumps');
    }
}
