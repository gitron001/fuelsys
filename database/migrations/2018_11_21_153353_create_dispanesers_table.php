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
