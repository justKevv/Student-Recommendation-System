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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('nim')->unique();
            $table->enum('study_program', ['Informatics Engineering', 'Business Information Systems']);
            $table->integer('semester');
            $table->json('skills')->nullable();
            $table->string('preferred_location')->nullable();
            $table->enum('preferred_internship_type', ['Remote', 'On-site', 'Hybrid'])->nullable();
            $table->string('cv_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
