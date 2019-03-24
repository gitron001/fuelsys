<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('status');
            $table->char('locker');
            $table->integer('tr_no');
            $table->char('receipt_no')->nullable();
            $table->char('sl_no');
            $table->integer('pfc_id');
            $table->integer('product_id');
            $table->char('dis_status')->nullable();
            $table->double('price');
            $table->double('lit');
            $table->double('money');
            $table->longText('dis_tot');
            $table->longText('pfc_tot');
            $table->char('tr_status')->nullable();
            $table->integer('user_id')->nullable();
            $table->char('ctype')->nullable();
            $table->char('method')->nullable();
            $table->integer('bill_no')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
