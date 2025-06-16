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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->string('title');
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'freelance']);
            $table->string('company');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_currently_working_here');
            $table->enum('type', ['remote', 'on_site', 'hybrid']);
            $table->json('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
