@extends('layout.app', [
    'userName' => 'Yuma Akhunza',
    'userProfileImage' => 'https://placehold.co/50x50'

])

@section('title')
    Admin
@endsection

@section('content')
    <x-admin.layout>
        <!-- Main Content Area -->
        <x-dashboard.main-content>
            <!-- Hero Banner Section -->
            <x-heroAdmin-banner>
                <div class="absolute left-[27px] top-[23px] space-y-3">

                    <!-- Title -->
                    <div class="space-y-2">
                        <h1 class="text-main6 text-3xl font-semibold font-['Poppins'] leading-tight">
                            Hello Admin! Welcome Back
                        </h1>
                        <h2 class="text-main6 text-3xl font-semibold font-['Poppins'] leading-tight">
                            Top Internship Opportunities
                        </h2>
                    </div>
                </div>

            </x-heroAdmin-banner>

                        <!-- Current Internship Section -->
            <x-admin.effectiv-system />
            <!-- Continue Looking Section -->
            
        </x-dashboard.main-content>

        <!-- Sidebar -->
         <x-admin.barChart/>

    </x-dashboard.layout>

    <x-admin.data-analytic/>

@endsection
