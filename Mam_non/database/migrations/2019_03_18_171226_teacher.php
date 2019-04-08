<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Teacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('teacher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher');
            $table->integer('born');
            $table->unsignedBigInteger('classes_id');
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->string('position');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('filesImage');
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
        Schema::dropIfExists('teacher');
    }
}
