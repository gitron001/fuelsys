<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('fis_number');
            $table->integer('starting_balance');
            $table->integer('bis_number');
            $table->string('contact_person');
            $table->integer('tax_number');
            $table->integer('res_number');
            $table->integer('tel_number');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->integer('type');
            $table->integer('status');
            $table->integer('limits');
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
        Schema::dropIfExists('companies');
    }
}
