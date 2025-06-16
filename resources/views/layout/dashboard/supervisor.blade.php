<x-dashboard.layout :gap='"30px"'>
    <x-hero-banner :background='"main"'>
        <div class="top-0 absolute left-[27px] right-[300px] h-full flex flex-col justify-center py-4 z-10">
            <div class="space-y-3">
                <h1 class="text-white text-4xl font-bold font-['Poppins'] leading-tight">
                    Hello {{ $user->first_name }}! Welcome back
                </h1>
            </div>
            <p class="text-white text-lg font-normal font-['Poppins'] mt-2">
                Here's the latest update on your internship students
            </p>
        </div>
    </x-hero-banner>
<x-supervisor.info title="Active Internship" :count="$activeInternships ?? 0" />
<x-supervisor.info title="Active Company" :count="$activeCompanies ?? 0" />
</x-dashboard.layout>

<x-dashboard.student-table :paginator="$supervisedApplications ?? null">
@if(isset($supervisedApplications) && $supervisedApplications->count() > 0)
    @foreach($supervisedApplications as $application)
        <x-dashboard.student-pill
            href="{{ route('student-detail', $application->student->id) }}"
            :profile="$application->student->user->profile_picture ?? 'https://placehold.co/55x55'"
            :name="$application->student->user->name"
            :role="$application->internship->title . ' at ' . $application->internship->company->name"
            completed="{{ rand(0, 7) }}"
        />
    @endforeach
@else
    <div class="py-8 text-center text-gray-500">
        <p>No supervised students found.</p>
    </div>
@endif
</x-dashboard.student-table>
