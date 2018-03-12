<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosisMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_medical_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('diagnosis_id');
            $table->unsignedInteger('medical_record_id');
            $table->timestamps();

            $table->foreign('diagnosis_id')
                ->references('id')
                ->on('diagnoses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('medical_record_id')
                ->references('id')
                ->on('medical_records')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_medical_records');
    }
}
