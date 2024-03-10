<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('name');
            $table->text('domain');
            $table->integer('year_founded');
            $table->text('industry');
            $table->text('size_range');
            $table->text('locality');
            $table->string('country');
            $table->text('linkedin_url');
            $table->integer('current_employee_estimate');
            $table->integer('total_employee_estimate');
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
        Schema::dropIfExists('companies');
    }
}
