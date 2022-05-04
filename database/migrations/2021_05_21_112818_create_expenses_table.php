<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('date')->index();
            $table->double('amount');
            $table->text('description')->nullable();
            $table->string('expense_type')->nullable();
            $table->integer('user_id')->nullable()->index();
            $table->integer('company_id')->nullable()->index();
            $table->integer('category_id')->nullable()->index();
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
        Schema::dropIfExists('expenses');
    }
}
