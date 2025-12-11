<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('resume')->nullable(); // file path
            $table->text('cover_letter')->nullable();
            $table->foreignId('job_id')->nullable()->constrained('career_jobs')->onDelete('cascade');
            $table->foreignId('intern_id')->nullable()->constrained('career_internships')->onDelete('cascade');
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('career_applications');
    }
};
