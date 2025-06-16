@extends('layout.app')

@section('title')
    Student
@endsection

@section('content')
    <x-dashboard.layout gap="30px">
        <div class="space-y-5">
            @if(isset($student) && isset($application))
                <x-profile.user-profile
                    name="{{ $student->user->name }}"
                    avatarImage="{{ $student->user->profile_picture ?? 'https://placehold.co/50x50' }}"
                    :applications="$application"
                    :studyProgram="$student->study_program"
                    :position="$application->internship->title ?? 'Student'"
                    :company="$application->internship->company->name ?? 'Not assigned'"
                    :workType="$student->preferred_internship_type"
                    :location="$student->preferred_location"
                />
                <x-profile.student-information
                    email="{{ $student->user->email ?? 'No email' }}"
                    phone="{{ $student->user->phone ?? 'No phone' }}"
                    userId="{{ $student->user->id }}"
                    studentId="{{ $student->nim }}"
                    studyProgram="{{ $student->study_program }}"
                    semester="{{ $student->semester }}"
                />
            @else
                <x-profile.user-profile
                    name="{{ isset($user) ? $user->name : 'Student' }}"
                    avatarImage="{{ isset($user) && $user->profile_picture ? $user->profile_picture : 'https://placehold.co/50x50' }}"
                />
                <x-profile.student-information />
            @endif
            <x-profile.skills :skills="$student->skills ?? []" :addicon="false" :editicon="false"/>
        </div>
        {{-- Right Column --}}
        <div class="space-y-5">
            <x-studup.internship-report :applicationId="isset($application) ? $application->id : null" />
            @if(isset($application))
                <x-studup.daily-log-viewer :applicationId="$application->id" />
            @endif
            <x-studup.comment
                :supervisorName="isset($user) ? $user->name : 'Supervisor'"
                :supervisorRole="isset($user) && $user->role === 'supervisor' ? 'Supervisor' : 'User'"
                :supervisorImage="isset($user) && $user->profile_picture ? $user->profile_picture : 'https://placehold.co/50x50'"
                :applicationId="isset($application) ? $application->id : null"
                :isSupervisor="isset($user) && $user->role === 'supervisor'"
            />
        </div>
    </x-dashboard.layout>
@endsection
