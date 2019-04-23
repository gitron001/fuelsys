<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfid');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('company_id')->default('0');
            $table->integer('one_time_limit')->default('0');
            $table->string('plates')->default('0');
            $table->string('vehicle')->default('0');
            $table->integer('status')->default('1');
            $table->integer('type')->default('1');
            $table->double('starting_balance')->default('0');
            $table->double('limits')->default('0');
            $table->double('limit_left')->default('0');
            $table->string('remember_token')->default('');
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
        Schema::dropIfExists('users');
    }
}
