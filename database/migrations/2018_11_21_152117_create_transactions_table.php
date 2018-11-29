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
            //$table->increments('tr_no');
            $table->char('sl_no');
            $table->char('tn_no');
            $table->char('sts');
            $table->integer('price');
            $table->longText('lit');
            $table->longText('money');
            $table->longText('ctot');
            $table->longText('mtot');
            $table->char('~status');
            $table->longText('card');
            $table->char('ctype');
            $table->char('method');
            $table->integer('bill_no');
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
        Schema::dropIfExists('transactions');
    }
}
