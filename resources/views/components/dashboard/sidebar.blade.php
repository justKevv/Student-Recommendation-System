@props([
    'topRolesTitle' => 'Top Three Role',
    'internshipLogTitle' => 'Internship Log',
    'student',
])

<div class="flex-shrink-0 w-[396px] h-[925px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] px-6 py-6">
    <div class="space-y-6">
        <!-- Top Three Role Section -->
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <h2 class="text-main text-xl font-medium font-['Poppins']">
                    {{ $topRolesTitle }}
                </h2>
                <button type="button"
                    class="text-sm transition-colors duration-300 cursor-pointer text-redgoon hover:underline"
                    data-hs-overlay="#recommendations-modal">
                    View More
                </button>
            </div>

            <!-- Recommended Components -->
            <div class="space-y-3">
                {{ $slot }}
            </div>
        </div>

        <!-- Internship Log Section -->
        <div class="space-y-4">
            <h2 class="text-main text-xl font-medium font-['Poppins']">
                {{ $internshipLogTitle }}
            </h2>

            <!-- Calendar Component -->
            @if($student->applications()->where('status', 'accepted')->exists())
                <x-calender :applicationId="$student->applications()->where('status', 'accepted')->first()->id" />
            @else
                <div class="p-4 text-center text-gray-500 bg-gray-100 rounded-lg">
                    No accepted internship application found
                </div>
            @endif
        </div>
    </div>
</div>
