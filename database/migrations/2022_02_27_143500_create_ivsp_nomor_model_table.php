<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvspNomorModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivsp_nomor_model', function (Blueprint $table) {
            $table->id();
            $table->string('instrument_model',100);
            $table->string('serial_number',100);
            $table->string('fault_report',100);
            $table->string('ivsp_id',12);
            $table->foreign('ivsp_id')->references('id')->on('ivsp');
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
        Schema::dropIfExists('gr_nomor_model');
    }
}
