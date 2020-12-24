<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
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
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->enum('job_type', ['internship', 'freelancer', 'part_time', 'full_time', 'contract_base'])->nullable();
            $table->enum('shift', ['morning', 'evening', 'night'])->nullable();
            $table->string('experience')->nullable();
            $table->string('qualification')->nullable();
            $table->string('currency')->nullable();
            $table->string('pay_start')->nullable();
            $table->string('pay_end')->nullable();
            $table->enum('pay_type', ['monthly', 'weekly', 'daily', 'hourly', 'yearly'])->nullable();
            $table->longText('description')->nullable();
            $table->longText('allownces')->nullable();
            $table->longText('requirements')->nullable();
            $table->timestamp('valid_till')->nullable();
            $table->enum('job_status', ['pending', 'no_longer_available'])->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('urgent')->default(0);
            $table->boolean('featured')->default(0);
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
}
