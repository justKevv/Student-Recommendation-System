@extends('layout.app', [
    'userName' => 'Yuma Akhunza',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Detail Company
@endsection

@section('content')
    <div class="container mx-auto min-h-screen font-sans">
        <div class="flex flex-col gap-8 lg:flex-row">
            {{-- Bagian Kiri: Detail Magang --}}
            <div class="space-y-6 lg:w-2/3">
                {{-- Header Magang dipanggil sebagai komponen --}}
                <x-companydetail.internship />

                {{-- Role Description dipanggil sebagai komponen --}}
                <x-companydetail.about />

                {{-- Key Responsibilities dipanggil sebagai komponen --}}
                <x-companydetail.reason />

                {{-- Requirement dipanggil sebagai komponen --}}
                <x-companydetail.nicetohave />
            </div>
            <div class="space-y-6 lg:w-1/3">
                {{-- Aksi & Statistik dipanggil sebagai komponen --}}
                <x-companydetail.information />
            </div>
        </div>
    </div>
@endsection
