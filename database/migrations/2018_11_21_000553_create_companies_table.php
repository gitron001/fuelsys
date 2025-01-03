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
            $table->integer('fis_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('main_url')->nullable();
            $table->integer('tax_number')->nullable();
            $table->integer('res_number')->nullable();
            $table->integer('printer_id')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('images')->nullable();
            $table->string('country')->nullable();
            $table->integer('status');
            $table->double('starting_balance')->nullable();
            $table->double('limits')->nullable();
            $table->double('limit_left')->nullable();
            $table->tinyInteger('has_limit')->default(0);
            $table->tinyInteger('print_transaction')->default(0);
            $table->string('transaction_location')->nullable();
            $table->integer('show_transaction')->default(0);
            $table->integer('direct_login')->default(0);
            $table->integer('show_transaction_time')->default(0);
            $table->tinyInteger('has_receipt')->default(0);
            $table->tinyInteger('has_receipt_nr')->default(0);
            $table->boolean('display_users_by_plates')->default(0);
            $table->string('base_ip')->nullable();
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
