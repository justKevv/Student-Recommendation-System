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
            <div class="space-y-6 lg:w-2/3">
                <x-company.internship />

                <x-company.about />

                <x-company.hiring />

                <x-company.nicetohave />
            </div>
            <div class="space-y-6 lg:w-1/3">
                <x-company.information />
            </div>
        </div>
    </div>
@endsection
