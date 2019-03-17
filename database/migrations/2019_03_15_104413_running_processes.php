<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RunningProcesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('start_time');
            $table->integer('refresh_time');
            $table->double('faild_attempt');
            $table->double('class_name');
            $table->double('type_id');
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
        Schema::dropIfExists('running_processes');
    }
}
