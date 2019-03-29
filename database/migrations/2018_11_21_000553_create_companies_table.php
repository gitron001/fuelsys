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
            $table->integer('bis_number')->index();
            $table->integer('fis_number');
            $table->string('contact_person');
            $table->integer('tax_number');
            $table->integer('res_number');
            $table->integer('tel_number');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->integer('status');
            $table->double('starting_balance')->default(0);
            $table->double('limits');
            $table->double('limit_left');
            $table->tinyInteger('has_limit')->default(0);
            $table->tinyInteger('has_receipt')->default(0);
            $table->tinyInteger('has_receipt_nr')->default(0);
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
