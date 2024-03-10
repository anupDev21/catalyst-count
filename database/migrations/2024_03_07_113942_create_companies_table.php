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
            $table->string('name')->nullable();
            $table->text('domain'->nullable());
            $table->integer('year_founded')->nullable();
            $table->text('industry')->nullable();
            $table->text('size_range')->nullable();
            $table->text('locality')->nullable();
            $table->string('country')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->integer('current_employee_estimate')->nullable();
            $table->integer('total_employee_estimate')->nullable();
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
