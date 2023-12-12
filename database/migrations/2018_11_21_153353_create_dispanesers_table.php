<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispanesersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispanesers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('channel_id');
            $table->integer('pfc_id');
            $table->string('price_division')->default('1000');
            $table->string('lit_division')->default('100');
            $table->string('money_division')->default('100');
            $table->integer('current_user_id')->nullable();
            $table->integer('current_driver_id')->nullable();
            $table->integer('current_kilometers')->nullable()->default('0');
            $table->integer('current_bonus_user_id')->nullable();
            $table->integer('data_updated_at')->nullable();
            $table->integer('current_amount')->nullable();
            $table->integer('cardreader_status')->default('0');
            $table->integer('pump_status')->default('0');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('dispanesers');
    }
}
