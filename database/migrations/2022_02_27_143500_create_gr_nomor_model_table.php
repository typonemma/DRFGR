<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrNomorModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr_nomor_model', function (Blueprint $table) {
            $table->id();
            $table->string('instrument_model',100);
            $table->string('serial_number',100);
            $table->string('fault_report',100);
            $table->string('gr_id',16);
            $table->foreign('gr_id')->references('id')->on('gr');
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
