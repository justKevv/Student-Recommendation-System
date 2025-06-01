@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Student
@endsection

@section('content')
    <x-dashboard.layout gap="30px">
        <div class="space-y-5">
            <x-profile.user-profile name="Yuma Akhansa" avatarImage="https://placehold.co/50x50"/>
            <x-profile.student-information />
            <x-profile.skills :skills="['Sosial', 'Logging', 'Lalala', 'wow']" :addicon="false" :editicon="false"/>
        </div>
        {{-- Right Column --}}
        <div class="space-y-5">
            <x-studup.internship-report />
            <x-studup.daily-log />
            <x-studup.comment />
        </div>
    </x-dashboard.layout>
@endsection
