<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->date('dob');
            $table->string('phone_number');
            $table->string('sex');
            $table->string('history_of_allergy');
            $table->unsignedInteger('patient_category_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_category_id')
                ->references('id')
                ->on('patient_categories')
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
        Schema::dropIfExists('patients');
    }
}
