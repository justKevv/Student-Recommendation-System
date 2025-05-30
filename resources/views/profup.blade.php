{{-- resources/views/profup.blade.php --}}
@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container mx-auto font-inter min-h-screen">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">My Profile</h1>

        {{-- Top Profile Card (using the component) --}}
        <div class="mb-8">
            <x-profup.user-profile
                name="Adevian Fairuz"
                role="Supervisor"
                location="Malang, Indonesia"
                avatarImage="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/image_90cbde.png"
            />
        </div>

        {{-- Personal Information Section --}}
        <div class="mb-8">
            <x-profup.personal-information
                firstName="Adevian"
                lastName="Fairuz"
                supervisorId="2341720233"
                emailAddress="adevianfairuz@example.com"
                phoneNumber="(+62) 812 2721-0624"
                major="Information Technology"
            />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <x-profup.expertise-area
                :expertiseAreas="[
                    'Systems Administration',
                    'Network Management',
                    'Cybersecurity',
                    'Cloud Computing',
                    'Database management'
                ]"
            />
            <x-profup.research-interest
                :researchInterests="[
                    'Artificial Intelligence',
                    'Machine learning',
                    'Cybersecurity',
                    'Cloud Computing',
                    'Internet of Things'
                ]"
            />
        </div>
    </div>
@endsection