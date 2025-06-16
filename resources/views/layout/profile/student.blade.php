<x-dashboard.layout gap="30px">
    <div class="space-y-5">
        <x-profile.user-profile name="{{ $user->name }}" avatarImage="{{ $user->profile_picture }}" :applications="$acceptedApplication"
            :studyProgram="$user->student->study_program"
            :workType="$user->student->preferred_internship_type"
            :location="$user->student->preferred_location" />
        <x-profile.student-information email="{{ $user->email }}" phone="{{ $user->phone }}" userId="{{ $user->id }}"
            studentId="{{ $user->student->nim }}" studyProgram="{{ $user->student->study_program }}"
            semester="{{ $user->student->semester }}" />
        <x-profile.skills :skills="$user->student->skills" :userId="$user->id" />
    </div>
    {{-- Right Column --}}
    <div class="space-y-5">
        <x-profile.right-panel :userId="$user->id" title="Experience" :editicon="false">
            @foreach ($user->student->experiences as $experience)
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

                <x-profile.experience-item :experienceId="$experience->id" :userId="$user->id" :title="$experience->title" :company="$experience->company"
                    :employmentType="$employmentType" :duration="$duration" :descriptionPoints="$descriptionPoints" />
                @if (!$loop->last)
                    <hr class="my-4 border-gray-300">
                @endif
            @endforeach
        </x-profile.right-panel>
        <x-profile.right-panel title="Project" :userId="$user->id" :editicon="false">
            @foreach ($user->student->projects as $project)
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
                <x-profile.project-item :projectId="$project->id" :userId="$user->id" :title="$projectData['title']" :description="$projectData['description']"
                    :media="$projectData['media']" :technologies="$projectData['technologies']" :projectUrl="$projectData['projectUrl']" :githubUrl="$projectData['githubUrl']" />
                @if (!$loop->last)
                    <hr class="my-6 border-gray-300">
                @endif
            @endforeach
        </x-profile.right-panel>
        <x-profile.right-panel title="Certificate" :userId="$user->id" :editicon="false">
            {{-- Certificates --}}
            @foreach ($user->student->certificates as $certificate)
                <x-profile.certificate-item :certificateId="$certificate->id" :userId="$user->id"
                    certificateName="{{ $certificate->title }}" issuingOrganization="{{ $certificate->issuer }}"
                    date="{{ $certificate->issue_date->format('F Y') }}" description="{{ $certificate->description }}"
                    imagePath="{{ $certificate->certificate_image }}"
                    certificateUrl="{{ $certificate->certificate_link }}" />
                @if (!$loop->last)
                    <hr class="my-6 border-gray-300">
                @endif
            @endforeach
        </x-profile.right-panel>
        <x-profile.right-panel title="CV" :addicon="false" :userId="$user->id">
            <x-profile.cv-item cvName="{{ Str::title(Str::snake($user->name)) }}_CV.pdf"
                cvPath="{{ $user->student->cv_path }}" />
        </x-profile.right-panel>
    </div>
</x-dashboard.layout>

{{-- Modal Components --}}
<x-profile.modal.edit-cv :userId="$user->id" />
<x-profile.modal.experience :userId="$user->id" :isEdit="false" />
<x-profile.modal.project :userId="$user->id" modalType="add" />
<x-profile.modal.certificate :userId="$user->id" modalType="add" />

{{-- Individual Experience Edit Modals --}}
@foreach ($user->student->experiences as $experience)
    <x-profile.modal.experience :userId="$user->id" :experienceId="$experience->id" :experience="$experience" :isEdit="true" />
@endforeach

{{-- Individual Project Edit Modals --}}
@foreach ($user->student->projects as $project)
    @php
        // Prepare data for the edit modal
        $technologies = $project->project_skills;
        if (is_string($technologies)) {
            $technologies = json_decode($technologies, true) ?: [];
        } elseif (!is_array($technologies)) {
            $technologies = [];
        }
    @endphp
    <x-profile.modal.project :userId="$user->id" :projectId="$project->id" modalType="edit" :title="$project->title"
        :description="$project->description" :media="$project->project_image" :technologies="$technologies" :projectUrl="$project->live_link" :githubUrl="$project->github_link" />
@endforeach

{{-- Individual Certificate Edit Modals --}}
@foreach ($user->student->certificates as $certificate)
    <x-profile.modal.certificate :userId="$user->id" :certificateId="$certificate->id" modalType="edit" :certificateName="$certificate->title"
        :issuingOrganization="$certificate->issuer" :date="$certificate->issue_date->format('Y-m-d')" :description="$certificate->description" :imagePath="$certificate->certificate_image ?: ''" :certificateUrl="$certificate->certificate_link" />
@endforeach

{{-- Delete Modals --}}
@foreach ($user->student->experiences as $experience)
    <x-profile.delete-modal :route="route('student.experience.destroy', $experience->id)" :itemId="$experience->id" itemType="experience" title="Delete Experience"
        description="Are you sure you want to delete this experience? This action cannot be undone." />
@endforeach

@foreach ($user->student->projects as $project)
    <x-profile.delete-modal :route="route('student.project.destroy', $project->id)" :itemId="$project->id" itemType="project" title="Delete Project"
        description="Are you sure you want to delete this project? This action cannot be undone." />
@endforeach

@foreach ($user->student->certificates as $certificate)
    <x-profile.delete-modal :route="route('student.certificate.destroy', $certificate->id)" :itemId="$certificate->id" itemType="certificate" title="Delete Certificate"
        description="Are you sure you want to delete this certificate? This action cannot be undone." />
@endforeach
