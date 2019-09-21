<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('exported')->default(0)->after('user_id');
            $table->integer('branch_id')->nullable()->after('user_id');
            $table->integer('branch_transaction_id')->nullable()->after('user_id');
        });
    }

}
