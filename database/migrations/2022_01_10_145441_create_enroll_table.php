<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->unsignedBigInteger('idClass')->nullable();
            $table->string('emailStudent')->nullable(); 
            $table->foreign('emailStudent')->references('email')->on('students')->onDelete('cascade');
            $table->foreign('idClass')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enroll');
    }
}
