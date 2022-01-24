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
            $table->bigIncrements('id');
            $table->char('status');
            $table->integer('error_flag')->default(0);
            $table->char('locker');
            $table->integer('tr_no');
			$table->integer('channel_id')->nullable()->index();
            $table->integer('receipt_no')->nullable()->index();
            $table->integer('sl_no');
            $table->integer('pfc_id');
            $table->integer('product_id')->index();
            $table->integer('printed')->default(0);
            $table->integer('tank_level')->nullable();
            $table->char('dis_status')->nullable();
            $table->double('price');
            $table->double('lit');
            $table->double('money');
            $table->longText('dis_tot');
            $table->longText('pfc_tot');
            $table->double('lit_tot')->default(0);
            $table->longText('dis_tot_last')->nullable();
            $table->longText('pfc_tot_last')->nullable();
            $table->char('tr_status')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->bigInteger('driver_id')->nullable()->index();
            $table->bigInteger('bonus_user_id')->nullable()->index();
            $table->integer('invoice_id')->default(0);
            $table->char('ctype')->nullable();
            $table->char('method')->nullable();
            $table->integer('type')->nullable();
            $table->integer('bill_no')->nullable();
            $table->integer('created_at')->index();
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
