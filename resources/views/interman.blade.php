@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Internship Management
@endsection

@section('content')
    <div class="container mx-auto min-h-screen font-sans">
        <div class="flex flex-col gap-6 lg:flex-row">
            <div class="space-y-6 lg:w-2/3">
                <x-internship-details.internship
                    :title="$internship->title"
                    :company="$internship->company->name"
                    :update="$internship->updated_at->format('M j, Y')"
                    :location="$internship->location"
                    :due="$internship->remaining_time"
                    href="{{ route('detail.company', Str::slug($internship->company->name)) }}"
                     />

                <x-internship-details.role-desc
                    :description="$internship->description" />

                <x-internship-details.key-resp :responsibilities="$internship->responsibilities"/>

                <x-internship-details.requirement :requirements="$internship->requirements"/>
            </div>

            <div class="space-y-6 lg:w-1/3">
                <x-internship-details.apply :people='1' :type="$internship->type" :role="$user->role" />

                <x-internship-details.eligibility :eligibilities="$internship->eligibility_criteria" />
            </div>
        </div>
    </div>
@endsection
