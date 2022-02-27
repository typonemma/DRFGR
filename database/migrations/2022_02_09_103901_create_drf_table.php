<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('to',30)->default('Service Dapaterment Head');
            $table->string('cc',30);
            $table->string('cea_project',100);
            $table->string('cea_svo',100);
            $table->string('ci_company_name',100);
            $table->string('ci_phone_company',16);
            $table->string('ci_contact_person',100);
            $table->string('ci_email_company',100);
            $table->string('ci_address',255);
            $table->date('di_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('di_date_end');
            $table->integer('number_of_engineering');
            $table->string('sitework_location',255);
            $table->string('lodging_recomendation',255);
            $table->string('scope_instrument_name',255);
            $table->string('scope_model_code',255);
            $table->string('post_work_document',100);
            $table->string('work_type',100);
            $table->text('description');
            $table->string('gl_initial',255);
            $table->string('engineer_signed_1',255);
            $table->string('engineer_signed_2',255);
            $table->string('current_work_status',255);
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
