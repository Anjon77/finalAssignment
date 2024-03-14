<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('company_name');
            $table->string('location');
            $table->text('job_description')->nullable();
            $table->string('qualification');
            $table->integer('vacancy');
            $table->string('salary')->nullable();
            $table->date('deadline');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('job_type', ['full_time', 'part_time', 'internship']);
            $table->enum('experience', ['Below_1_year', 'Above_1_year', '2_years', 'Above_2_years']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_jobs');
    }
};
