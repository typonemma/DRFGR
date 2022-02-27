<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gr', function (Blueprint $table) {
            $table->string('id',12)->primary();
            $table->string('for',30);
            $table->string('customer_name',100);
            $table->string('customer_address',255);
            $table->string('customer_telephone',16);
            $table->string('contact_person',100);
            $table->date('in_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('email',50);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gr');
    }
}
