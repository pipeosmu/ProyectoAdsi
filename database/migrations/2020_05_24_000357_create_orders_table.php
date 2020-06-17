<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_order');
            $table->date('date_service');
            $table->string('status_order');
            $table->bigInteger('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id')->on('users');
            $table->bigInteger('fk_service')->unsigned();
            $table->foreign('fk_service')->references('id')->on('services');
            $table->bigInteger('fk_address')->unsigned();
            $table->foreign('fk_address')->references('id')->on('address_user');
            $table->bigInteger('fk_score')->unsigned()->nullable();
            $table->foreign('fk_score')->references('id')->on('score');
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
        Schema::dropIfExists('orders');
    }
}
