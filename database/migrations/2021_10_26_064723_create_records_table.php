<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('complianant_name');
            $table->string('complianant_statement');
            $table->string('respondent_name');
            $table->string('location_incident');
            $table->string('type_incident');
            $table->string('date_time_reported');
            $table->string('date_time_incident');
            $table->string('status');
            $table->string('remarks');
            $table->string('action_taken');
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
        Schema::dropIfExists('records');
    }
}
