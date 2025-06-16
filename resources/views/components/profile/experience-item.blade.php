@props([
    'experienceId' => null,
    'userId' => null,
    'title' => '',
    'company' => '',
    'employmentType' => '',
    'duration' => '',
    'descriptionPoints' => []
])

<div class="relative mt-4 group">
    <!-- Edit and Delete buttons for individual experience -->
    @if($experienceId && $userId)
        <div class="absolute top-0 right-0 flex space-x-1 opacity-0 group-hover:opacity-100">
            @if (auth()->user()->role != 'admin' && auth()->user()->id == $userId)
                <!-- Edit button -->
                <button
                    class="p-2 transition-colors duration-200 border border-gray-300 rounded-full hover:bg-gray-200"
                    aria-haspopup="dialog" aria-expanded="false"
                    aria-controls="hs-vertically-centered-modal-edit-experience-{{ $experienceId }}-area-{{ $userId }}"
                    data-hs-overlay="#hs-vertically-centered-modal-edit-experience-{{ $experienceId }}-area-{{ $userId }}"
                    title="Edit Experience">
                    <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/fluent_edit-16-filled.png" class="w-4 h-4" alt="Edit">
                </button>

                <!-- Delete button -->
                <x-profile.delete-button
                    :route="route('student.experience.destroy', $experienceId)"
                    :itemId="$experienceId"
                    itemType="experience"
                    title="Delete Experience"
                    description="Are you sure you want to delete this experience? This action cannot be undone." />
            @endif
        </div>
    @endif


    <h3 class="text-lg font-semibold text-gray-800 font-['Poppins']">{{ $title }}</h3>
    <p class="text-md text-gray-600 font-['Poppins']">{{ $company }} &middot; {{ $employmentType }}</p>
    <p class="text-sm text-gray-500 font-['Poppins'] mb-2">{{ $duration }}</p>
    @if(count($descriptionPoints) > 0)
        <ul class="list-disc list-inside space-y-1 text-sm text-gray-700 font-['Poppins']">
            @foreach($descriptionPoints as $point)
                <li>{{ Str::limit($point, 150) }}</li>
            @endforeach
        </ul>
    @endif
</div>
