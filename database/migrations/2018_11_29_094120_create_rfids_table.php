<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfid');
            $table->string('rfid_name');
            $table->integer('user_id');
            $table->integer('company_id')->default('0');
            $table->integer('one_time_limit')->default('0');
            $table->string('plates')->default('0');
            $table->string('vehicle')->default('0');
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rfids');
    }
}
