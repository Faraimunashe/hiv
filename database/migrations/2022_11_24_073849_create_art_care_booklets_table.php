<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_care_booklets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->date('date');
            $table->integer('weight');
            $table->integer('height');
            $table->string('clinical_stage');
            $table->string('tb_status');
            $table->date('next_date');
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
        Schema::dropIfExists('art_care_booklets');
    }
};
