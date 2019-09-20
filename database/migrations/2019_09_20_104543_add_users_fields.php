<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('exported')->nullable()->after('password');
            $table->integer('branch_id')->nullable()->after('rfid');
            $table->integer('branch_user_id')->nullable()->after('rfid');
        });
    }
}
