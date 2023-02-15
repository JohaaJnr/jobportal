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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->String('user_id');
            $table->String('job_title');
            $table->String('job_type');
            $table->String('job_vacancies');
            $table->String('job_salary');
            $table->String('job_location');
            $table->String('job_contact');
            $table->String('job_meta');
            $table->String('company_name');
            $table->integer('category_id');
            $table->String('job_description');
            $table->String('job_image')->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
