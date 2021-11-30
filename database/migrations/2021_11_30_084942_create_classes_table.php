<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->string('className');
            $table->string('subject');
            $table->time('startTime');
            $table->time('endTime');
            $table->integer('dayOfWeek')->nullable();
            $table->string('emailTutor')->nullable(); 
            $table->foreign('emailTutor')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
