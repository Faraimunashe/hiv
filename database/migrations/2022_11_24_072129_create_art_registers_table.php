<?php

use Brick\Math\BigInteger;
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
        Schema::create('art_registers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->string('function_status');
            $table->integer('weight');
            $table->string('clinical_stage');
            $table->string('cd4t_count');
            $table->string('original_regiment');
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
        Schema::dropIfExists('art_registers');
    }
};
