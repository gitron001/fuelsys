<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('created_at');
            $table->integer('updated_at');
        });

        DB::table('roles')->insert([
            'name' => 'Shites',
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);
        DB::table('roles')->insert([
            'name' => 'Menaxher',
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
