<x-dashboard.layout>
    <x-dashboard.main-content >
        <x-hero-banner :background='"main"' >
            <div class="top-0 absolute left-[27px] right-[300px] h-full flex flex-col justify-center py-4 z-10">
                <div class="space-y-3">
                    <h1 class="text-white text-4xl font-bold font-['Poppins'] leading-tight">
                        Hello {{ $user->name }}! Welcome back
                    </h1>
                </div>
                <p class="text-white text-lg font-normal font-['Poppins'] mt-2">
                    Here's the latest update on the internships!
                </p>
            </div>
        </x-hero-banner>
        <x-admin.effectiv-system :studentSupervisorCounts="$studentSupervisorCounts" :studentInternshipPercentage="$studentInternshipPercentage" :internshipTypeDistribution="$internshipTypeDistribution"/>

    </x-dashboard.main-content>
    <x-admin.barChart :internshipCounts="$internshipCounts"/>
</x-dashboard.layout>
<x-admin.data-analytic :studentOutcomeTrends="$studentOutcomeTrends"/>
