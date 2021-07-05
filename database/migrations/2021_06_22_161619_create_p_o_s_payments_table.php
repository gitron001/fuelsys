<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePOSPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('date')->index();
            $table->double('amount');
            $table->integer('bank_id')->nullable()->index();
            $table->integer('created_by')->index();
            $table->integer('edited_by')->nullable()->index();
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
        Schema::dropIfExists('pos_payments');
    }
}
