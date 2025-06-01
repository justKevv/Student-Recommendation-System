@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Internship Management
@endsection

@section('content')
    <div class="container mx-auto min-h-screen font-sans">
        <div class="flex flex-col gap-8 lg:flex-row">
            {{-- Bagian Kiri: Detail Magang --}}
            <div class="space-y-6 lg:w-2/3">
                {{-- Header Magang dipanggil sebagai komponen --}}
                <x-internship-details.internship />

                {{-- Role Description dipanggil sebagai komponen --}}
                <x-internship-details.role-desc />

                {{-- Key Responsibilities dipanggil sebagai komponen --}}
                <x-internship-details.key-resp />

                {{-- Requirement dipanggil sebagai komponen --}}
                <x-internship-details.requirement />
            </div>

            {{-- Bagian Kanan: Aksi & Statistik --}}
            <div class="space-y-6 lg:w-1/3">
                {{-- Aksi & Statistik dipanggil sebagai komponen --}}
                <x-internship-details.apply />

                {{-- Eligibility dipanggil sebagai komponen --}}
                <x-internship-details.eligibility />
            </div>
        </div>
    </div>
@endsection
