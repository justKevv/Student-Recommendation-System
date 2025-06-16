@extends('layout.app', [
    'userName' => $user->name,
    'userProfileImage' => $user->profile_picture ?? 'https://placehold.co/50x50'
])

@section('title')
    Student Application Detail
@endsection

@section('content')
    <x-dashboard.layout gap="30px">
        <div class="space-y-5">
            <x-profile.user-profile name="{{ $student->user->name }}" avatarImage="{{ $student->user->profile_picture }}" />
            <x-profile.student-information email="{{ $student->user->email }}" phone="{{ $student->user->phone }}" userId="{{ $student->user->id }}"
                studentId="{{ $student->nim }}" studyProgram="{{ $student->study_program }}"
                semester="{{ $student->semester }}" />            <x-profile.skills :skills="$student->skills" :userId="$student->user->id" />

            {{-- Applied Internship Card --}}
            <div class="w-[650px] p-6 bg-white rounded-[30px] shadow-md">
                <h2 class="mb-4 text-main text-xl font-semibold font-['Poppins']">Applied Internship</h2>

                {{-- Internship Card using the card design --}}
                <x-internship.card
                    :location="$internship->location"
                    :title="$internship->title"
                    :company="$internship->company->name"
                    :profile="$internship->company->profile_image ?? 'https://placehold.co/65x65'"
                    :applied="count($internship->applications)"
                    :due="$internship->remaining_time"
                    :type="$internship->type"
                    href="{{ route('detail.job', $internship->slug) }}"
                    :is_admin="false"
                    :internship_id="$internship->id"
                />
            </div>

            {{-- Application Actions --}}
            <div class="w-[650px] p-6 bg-white rounded-[30px] shadow-md">
                <h2 class="mb-4 text-main text-xl font-semibold font-['Poppins']">Application Status</h2>

                <div class="space-y-4">
                    {{-- Current Status --}}
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">Current Status:</span>
                        <x-dynamic-component :component="'status.' . $application->status" />
                    </div>                    {{-- Application Date --}}
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">Applied Date:</span>
                        <span class="text-sm text-gray-600">{{ $application->created_at->format('M d, Y') }}</span>
                    </div>                    {{-- Supervisor (if approved) --}}
                    @if($application->status === 'accepted' && $application->supervisor)
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Assigned Supervisor:</span>
                            <span class="text-sm text-gray-600">{{ $application->supervisor->user->name }}</span>
                        </div>
                    @endif

                    {{-- Feedback (if rejected) --}}
                    @if($application->status === 'rejected' && $application->feedback)
                        <div class="pt-2">
                            <span class="text-sm font-medium text-gray-700">Rejection Feedback:</span>
                            <p class="p-3 mt-1 text-sm text-gray-600 rounded-lg bg-gray-50">{{ $application->feedback }}</p>
                        </div>
                    @endif{{-- Action Buttons --}}
                    @if($application->status === 'pending')
                        <div class="flex gap-3 pt-4 border-t border-gray-200">
                            <button type="button"
                                class="flex-1 px-4 py-2 text-sm font-medium transition-opacity rounded-lg text-main bg-approved hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-approved"
                                data-hs-overlay="#approve-modal-{{ $application->id }}">
                                Approve Application
                            </button>

                            <button type="button"
                                class="flex-1 px-4 py-2 text-sm font-medium transition-opacity rounded-lg text-main bg-rejected hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rejected"
                                data-hs-overlay="#reject-modal-{{ $application->id }}">
                                Reject Application
                            </button>
                        </div>
                    @else
                        <div class="pt-4 border-t border-gray-200">
                            <p class="text-sm text-center text-gray-600">
                                This application has been {{ $application->status }}.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
          {{-- Right Column --}}
        <div class="space-y-5">
            <x-profile.right-panel :userId="$student->user->id" title="Experience" :editicon="false">
                @foreach ($student->experiences as $experience)
                    @php
                        // Format duration
                        $startDate = $experience->start_date->format('M Y');
                        $endDate = $experience->is_currently_working_here
                            ? 'Present'
                            : $experience->end_date->format('M Y');
                        $duration = $startDate . ' - ' . $endDate;

                        // Calculate duration in months/years if needed
                        if (!$experience->is_currently_working_here && $experience->end_date) {
                            $months = $experience->start_date->diffInMonths($experience->end_date);
                            $years = floor($months / 12);
                            $remainingMonths = $months % 12;

                            if ($years > 0 && $remainingMonths > 0) {
                                $duration .=
                                    ' • ' . $years . ' yr' . ($years > 1 ? 's' : '') . ' ' . $remainingMonths . ' mo';
                            } elseif ($years > 0) {
                                $duration .= ' • ' . $years . ' yr' . ($years > 1 ? 's' : '');
                            } else {
                                $duration .= ' • ' . $remainingMonths . ' mo';
                            }
                        }

                        // Format employment type
                        $employmentType = ucwords(str_replace('-', ' ', $experience->employment_type));

                        // Handle description points
                        $descriptionPoints = [];
                        if (is_array($experience->description)) {
                            foreach ($experience->description as $item) {
                                foreach (preg_split('/\r\n|\r|\n/', $item) as $line) {
                                    if (trim($line)) {
                                        $descriptionPoints[] = trim($line);
                                    }
                                }
                            }
                        } else {
                            foreach (preg_split('/\r\n|\r|\n/', $experience->description) as $item) {
                                if (trim($item)) {
                                    $descriptionPoints[] = trim($item);
                                }
                            }
                        }
                    @endphp

                    <x-profile.experience-item :experienceId="$experience->id" :userId="$student->user->id" :title="$experience->title" :company="$experience->company"
                        :employmentType="$employmentType" :duration="$duration" :descriptionPoints="$descriptionPoints" />
                    @if (!$loop->last)
                        <hr class="my-4 border-gray-300">
                    @endif
                @endforeach
            </x-profile.right-panel>
             <x-profile.right-panel title="Project" :userId="$student->user->id" :editicon="false">
                @foreach ($student->projects as $project)
                @php
                // Map database fields to component props
                $technologies = $project->project_skills;
                if (is_string($technologies)) {
                $technologies = json_decode($technologies, true) ?: [];
                } elseif (!is_array($technologies)) {
                $technologies = [];
                }

                $projectData = [
                'title' => $project->title,
                'description' => $project->description,
                'media' => $project->project_image ?: 'https://placehold.co/400x200',
                'technologies' => $technologies,
                'projectUrl' => $project->live_link,
                'githubUrl' => $project->github_link,
                ];
                @endphp
                <x-profile.project-item :projectId="$project->id" :userId="$student->user->id" :title="$projectData['title']" :description="$projectData['description']"
                    :media="$projectData['media']" :technologies="$projectData['technologies']"
                    :projectUrl="$projectData['projectUrl']" :githubUrl="$projectData['githubUrl']" />
                @if (!$loop->last)
                <hr class="my-6 border-gray-300">
                @endif
                @endforeach
            </x-profile.right-panel>
           <x-profile.right-panel title="Certificate" :userId="$student->user->id" :editicon="false">
                {{-- Certificates --}}
                @foreach ($student->certificates as $certificate)
                <x-profile.certificate-item :certificateId="$certificate->id" :userId="$student->user->id" certificateName="{{ $certificate->title }}"
                    issuingOrganization="{{ $certificate->issuer }}" date="{{ $certificate->issue_date->format('F Y') }}"
                    description="{{ $certificate->description }}"
                    imagePath="{{ $certificate->certificate_image }}"
                    certificateUrl="{{ $certificate->certificate_link }}" />
                @if (!$loop->last)
                <hr class="my-6 border-gray-300">
                @endif
                @endforeach
            </x-profile.right-panel>
            <x-profile.right-panel title="CV" :addicon="false" :userId="$student->user->id">
                <x-profile.cv-item cvName="{{ Str::title(Str::snake($student->user->name)) }}_CV.pdf"
                    cvPath="{{ $student->cv_path }}" />
            </x-profile.right-panel>        </div>
    </x-dashboard.layout>

{{-- Approve Modal --}}
<div id="approve-modal-{{ $application->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="approve-modal-label-{{ $application->id }}">
    <div class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h3 id="approve-modal-label-{{ $application->id }}" class="font-bold text-gray-800">
                    Approve Application
                </h3>
                <button type="button" class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#approve-modal-{{ $application->id }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 6-12 12"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('application.approve', $application->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-4 overflow-y-auto">
                    <p class="mt-1 text-gray-800">
                        Please select a supervisor for <strong>{{ $student->user->name }}</strong>'s internship application.
                    </p>
                    <div class="mt-4">
                        <label for="supervisor_id_{{ $application->id }}" class="block mb-2 text-sm font-medium">Select Supervisor</label>
                        <select id="supervisor_id_{{ $application->id }}" name="supervisor_id" class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                            <option value="">Choose a supervisor...</option>                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">
                                    {{ $supervisor->user->name }} - {{ $supervisor->nidn }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#approve-modal-{{ $application->id }}">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 bg-approved text-main hover:opacity-90 focus:outline-none focus:bg-approved disabled:opacity-50 disabled:pointer-events-none">
                        Approve Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Reject Modal --}}
<div id="reject-modal-{{ $application->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="reject-modal-label-{{ $application->id }}">
    <div class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h3 id="reject-modal-label-{{ $application->id }}" class="font-bold text-gray-800">
                    Reject Application
                </h3>
                <button type="button" class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#reject-modal-{{ $application->id }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 6-12 12"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('application.reject', $application->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-4 overflow-y-auto">
                    <p class="mt-1 text-gray-800">
                        Please provide feedback for rejecting <strong>{{ $student->user->name }}</strong>'s application.
                    </p>
                    <div class="mt-4">
                        <label for="feedback_{{ $application->id }}" class="block mb-2 text-sm font-medium">Rejection Feedback</label>
                        <textarea id="feedback_{{ $application->id }}" name="feedback" rows="4" class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Explain why this application is being rejected..." required></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 border-t gap-x-2">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#reject-modal-{{ $application->id }}">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 bg-rejected text-main hover:opacity-90 focus:outline-none focus:bg-rejected disabled:opacity-50 disabled:pointer-events-none">
                        Reject Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
