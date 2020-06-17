<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_experience', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('position');
            $table->string('time_experience_company');
            $table->string('description');
            $table->bigInteger('fk_curriculum')->unsigned();
            $table->foreign('fk_curriculum')->references('id')->on('curriculum');
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
        Schema::dropIfExists('working_experience');
    }
}
