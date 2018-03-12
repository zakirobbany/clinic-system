<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_medical_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medical_record_id');
            $table->unsignedInteger('medicine_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('medical_record_id')
                ->references('id')
                ->on('medical_records')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
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
        Schema::dropIfExists('medicine_medical_records');
    }
}
