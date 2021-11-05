<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentIssueCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_issue_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_certificate_id');
            $table->unsignedBigInteger('resident_issue_id');
            $table->foreign('issue_certificate_id')->references('id')->on('issue_certificates')->onDelete('cascade');
            $table->foreign('resident_issue_id')->references('id')->on('residents')->onDelete('cascade');
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
        Schema::dropIfExists('resident_issue_certificates');
    }
}
