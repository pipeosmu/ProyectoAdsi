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
            $table->bigIncrements('id');
            $table->string('identification_user')->unique();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('first_lastname');
            $table->string('second_lastname');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('phone');
            $table->string('civil_status');
            $table->string('gender');
            $table->string('photo')->default('imgs/no-photo.png');
            $table->string('role');
            $table->string('password');
            
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
