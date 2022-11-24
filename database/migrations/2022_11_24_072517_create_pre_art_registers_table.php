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
        Schema::create('pre_art_registers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->string('entry_point');
            $table->string('status_at_end');
            $table->string('clinical_stage');
            $table->date('date_eligible')->nullable();
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
        Schema::dropIfExists('pre_art_registers');
    }
};
