{{-- resources/views/components/profup/expertise-area.blade.php --}}
@props([
    'expertiseAreas' => [
        'Systems Administration',
        'Network Management',
        'Cybersecurity',
        'Cloud Computing',
        'Database management'
    ]
])

<div class="bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Expertise Area</h2>
    <div class="flex flex-wrap gap-3">
        @foreach($expertiseAreas as $area)
            <span class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">{{ $area }}</span>
        @endforeach
        <button class="inline-flex items-center justify-center w-12 h-10 rounded-[15px] bg-main text-white hover:bg-gray-300 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>
</div>