@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Dashboard
@endsection

@section('content')
    <x-dashboard.layout>
        <!-- Main Content Area -->
        <x-dashboard.main-content>
            <!-- Hero Banner Section -->
            <x-dashboard.hero-banner />

            <!-- Current Internship Section -->
            <x-dashboard.internship-section title="Your Internship" :isEmpty="true" />

            <!-- Continue Looking Section -->
            <x-dashboard.continue-looking title="Continue Looking">
                <x-last-seen />
                <x-last-seen />
                <x-last-seen />
            </x-dashboard.continue-looking>
        </x-dashboard.main-content>

        <!-- Sidebar -->
        <x-dashboard.sidebar />
    </x-dashboard.layout>
@endsection
