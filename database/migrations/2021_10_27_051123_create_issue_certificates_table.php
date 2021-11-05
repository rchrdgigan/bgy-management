<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('purpose');
            $table->string('or_number')->nullable();
            $table->string('generated_type');
            $table->string('date_issue');
            $table->string('date_expire');
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
        Schema::dropIfExists('issue_certificates');
    }
}
