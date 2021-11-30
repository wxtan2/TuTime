<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->string('backgroundColor');
            $table->time('startTime');
            $table->time('endTime');
            $table->integer('dayOfWeek')->nullable();
            $table->string('emailStudent')->nullable(); 
            $table->string('emailTutor')->nullable(); 
            $table->foreign('emailTutor')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('emailStudent')->references('email')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
