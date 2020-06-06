<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->required();
            $table->string('last_name');
            $table->string('email')->unique()->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->required();
            $table->string('type')->required();
            $table->string('language')->required();
            $table->string('timezone')->required();
            $table->enum('currency',['MXN','USD','EUR'])->default('MXN');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
