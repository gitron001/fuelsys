<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionaFiels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('companies', function (Blueprint $table) {
            $table->tinyInteger('printer_id')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('monthly_report')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('daily_at')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('on_transaction')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('send_email')->default(0)->after('has_receipt_nr');
            $table->integer('master_id')->nullable()->after('id');
            $table->integer('exported')->nullable()->after('email');
		});
		
		 Schema::table('transactions', function (Blueprint $table) {
            $table->integer('exported')->default(0)->after('user_id');
            $table->integer('branch_id')->nullable()->after('user_id');
            $table->integer('branch_transaction_id')->nullable()->after('user_id');
        });
		
        Schema::table('users', function (Blueprint $table) {
            $table->integer('exported')->nullable()->after('password');
            $table->integer('starting_cash')->nullable()->after('exported');
            $table->integer('branch_id')->nullable()->after('rfid');
            $table->integer('branch_user_id')->nullable()->after('rfid');
        });
		
		Schema::table('payments', function (Blueprint $table) {
            $table->integer('payment_type')->nullable()->after('date');
        });    
	
	}
	

}
