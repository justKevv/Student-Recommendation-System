@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Internship Management
@endsection

@section('content')
    <div class="container mx-auto font-sans min-h-screen">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Bagian Kiri: Detail Magang --}}
            <div class="lg:w-2/3 space-y-6">
                {{-- Header Magang dipanggil sebagai komponen --}}
                <x-interman.internship />

                {{-- Role Description dipanggil sebagai komponen --}}
                <x-interman.role-desc />

                {{-- Key Responsibilities dipanggil sebagai komponen --}}
                <x-interman.key-resp />

                {{-- Requirement dipanggil sebagai komponen --}}
                <x-interman.requirement />
            </div>

            {{-- Bagian Kanan: Aksi & Statistik --}}
            <div class="lg:w-1/3 space-y-6">
                {{-- Aksi & Statistik dipanggil sebagai komponen --}}
                <x-interman.apply />

                {{-- Eligibility dipanggil sebagai komponen --}}
                <x-interman.eligibility />
            </div>
        </div>
    </div>
@endsection