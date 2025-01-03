<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date')->index();
            $table->double('amount');
            $table->integer('type')->nullable();
            $table->text('description')->nullable();
            $table->integer('print')->default(0);
            $table->integer('user_id')->nullable()->index();
            $table->integer('company_id')->nullable()->index();
            $table->integer('branch_id')->nullable();
            $table->integer('branch_payment_id')->nullable();
            $table->integer('exported')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
