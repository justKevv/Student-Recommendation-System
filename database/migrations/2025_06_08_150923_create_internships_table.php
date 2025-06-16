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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('admins');
            $table->string('title');
            $table->text('description');
            $table->json('requirements');
            $table->json('eligibility_criteria');
            $table->json('responsibilities');
            $table->enum('type', ['remote', 'hybrid', 'on_site']);
            $table->string('location');
            $table->dateTime('open_until');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('internship_picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
