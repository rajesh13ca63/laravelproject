<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            
            $table->string('firstname',30);
            $table->string('midname', 30)->nullable();
            $table->string('lastname', 40);
            $table->string('sex', 6);
            $table->string('marital', 10);
            $table->date('dob');

            $table->string('street', 50);
            $table->string('city', 40);
            $table->string('state', 30);
            $table->string('zip', 8);
            $table->string('phone', 10);
            $table->string('email', 50);

            $table->string('offstreet', 40);
            $table->string('offcity', 40);
            $table->string('offstate', 30);
            $table->string('offzip', 8);
            $table->string('offphone', 10);
            $table->string('offemail', 50)->nullable();

            $table->string('image');
            $table->text('comment')->nullable();

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
        Schema::drop('users');
    }
}
