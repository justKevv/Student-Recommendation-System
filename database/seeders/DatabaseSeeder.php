<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Internship;
use App\Models\Supervisors;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin1@admin.polinema.ac.id',
            'role' =>'admin',
            'password' => bcrypt('12345678'),
            'phone' => '081234567890',
        ]);

        // === 2. CREATE THE SPECIFIC 'BACKEND DEVELOPER' TEST STUDENT ===
        $studentUser = User::factory()->create([
            'name' => 'Kevin Bramasta', // Using your existing test user
            'email' => '2341720233@student.polinema.ac.id',
            'role' =>'student',
            'password' => Hash::make('12345678'),
            'first_login' => false, // Simulating that this user has logged in before
            'phone' => '081234567891', // A slightly different number
        ]);

        // Create the student profile and link it to the user account
        $studentProfile = $studentUser->student()->create([
            'nim' => '2341720233', // Unique NIM
            'study_program' => 'Informatics Engineering',
            'semester' => 7,
            'skills' => [ // Laravel will automatically encode this to JSON
                "PHP", "Laravel", "Lumen", "REST APIs", "SQL", "MySQL",
                "PostgreSQL", "Git", "Docker", "Unit Testing", "Object-Oriented Programming (OOP)"
            ],
            'preferred_location' => 'Jakarta',
            'preferred_internship_type' => 'Remote',
        ]);

        // --- Create Experience records ---
        $studentProfile->experiences()->create([
            'title' => 'Backend Developer Intern',
            'employment_type' => 'full-time',
            'company' => 'PT Kode Nusantara',
            'start_date' => '2024-01-01',
            'end_date' => '2024-06-30',
            'is_currently_working_here' => false,
            'type' => 'hybrid',
            'description' => [
                "Developed and maintained RESTful APIs for a logistic service using the Laravel framework.",
                "Wrote and optimized complex SQL queries for data retrieval and reporting.",
                "Created unit and feature tests with PHPUnit to ensure code reliability and stability."
            ]
        ]);

        $studentProfile->experiences()->create([
            'title' => 'API Developer (Freelance)',
            'employment_type' => 'freelance',
            'company' => 'Startup Digital Mandiri',
            'start_date' => '2023-09-01',
            'end_date' => '2023-12-31',
            'is_currently_working_here' => false,
            'type' => 'remote',
            'description' => [
                "Built a secure authentication API for a mobile application using Laravel Passport.",
                "Designed a database schema and set up data models for a new project.",
                "Integrated the backend with a third-party payment gateway."
            ]
        ]);


        // --- Create Project records ---
        $studentProfile->projects()->create([
            'title' => 'Headless CMS API',
            'description' => 'A RESTful API service for a content management system. It handles user authentication, content creation, and data delivery for any frontend application.',
            'project_skills' => [
                "Laravel", "PHP", "MySQL", "REST APIs", "JWT Authentication", "Postman"
            ],
            'github_link' => 'https://github.com/example/cms-api',
        ]);

        $studentProfile->projects()->create([
            'title' => 'Job Board Data Aggregator',
            'description' => 'A scheduled service that automatically scrapes job listings from various online portals. It processes the raw HTML, extracts key information, and stores it in a normalized PostgreSQL database.',
            'project_skills' => [
                "Python", "Beautiful Soup", "Data Scraping", "PostgreSQL", "Cron Job"
            ],
            'github_link' => 'https://github.com/example/job-aggregator',
        ]);


        // --- Create Certificate records ---
        $studentProfile->certificates()->create([
             'title' => 'Certified Laravel Developer',
             'issuer' => 'Laravel Certification',
             'issue_date' => '2023-11-15',
             'description' => 'Official certification for advanced proficiency in the Laravel framework, covering concepts from Eloquent and the service container to testing and deployment.',
        ]);

        $studentProfile->certificates()->create([
             'title' => 'AWS Certified Cloud Practitioner',
             'issuer' => 'Amazon Web Services (AWS)',
             'issue_date' => '2024-03-20',
             'description' => 'Foundational certification demonstrating a comprehensive understanding of AWS cloud concepts, services, security, and billing.',
        ]);


        Admin::factory()->create([
            'user_id' => 1,
            'employee_id' => 1,
        ]);

        Company::factory(10)
            ->has(Internship::factory()->count(7))
            ->create();
    }
}
