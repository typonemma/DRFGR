<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drf', function (Blueprint $table) {
            $table->string('id',16)->primary();
            $table->date('date');
            $table->date('date_end');   
            $table->text('information');
            $table->string('status',3)->default('WTG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drf');
    }
}
