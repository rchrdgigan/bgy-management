<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('nname');
            $table->string('gender');
            $table->string('civil_status');
            $table->integer('age');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('cnumber');
            $table->dateTime('bday');
            $table->string('bplace');
            $table->string('email');
            $table->string('street');
            $table->string('purok');
            $table->string('citizenship');
            $table->string('religion');
            $table->string('position');
            $table->string('status');
            $table->string('image');
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
        Schema::dropIfExists('officials');
    }
}
