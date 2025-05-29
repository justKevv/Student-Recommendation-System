@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Dashboard
@endsection

@section('content')
<div class="absolute">
    <x-dashboard.layout :gap='"30px"'>
            <x-hero-banner :background='"main"'>
                <div class="top-0 absolute left-[27px] right-[300px] h-full flex flex-col justify-center py-4 z-10">
                    <div class="space-y-3">
                        <h1 class="text-white text-4xl font-bold font-['Poppins'] leading-tight">
                            Hello Adevian! Welcome back
                        </h1>
                    </div>
                    <p class="text-white text-lg font-normal font-['Poppins'] mt-2">
                        Here's the latest update on your internship students
                    </p>
                </div>
            </x-hero-banner>
        <x-supervisor.sidebar />
    </x-dashboard.layout>
</div>

<x-dashboard.student-table>
    @for ($i = 0; $i < 5; $i++)
        <x-dashboard.student-pill/>
    @endfor
</x-dashboard.student-table>


@endsection
