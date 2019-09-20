<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompaniesEmailSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('companies', function (Blueprint $table) {
            $table->tinyInteger('monthly_report')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('daily_at')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('on_transaction')->default(0)->after('has_receipt_nr');
            $table->tinyInteger('send_email')->default(0)->after('has_receipt_nr');
            $table->integer('master_id')->nullable()->after('id');
            $table->integer('exported')->nullable()->after('email');
		});
	}

}
