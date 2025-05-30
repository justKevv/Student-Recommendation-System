@props([
    'logs' => [
        'following the roll call',
        'introduce ourself to work staff',
        'Internship division',
        'introduction to the work environment',
        'work scheduling'
    ],
    'image1' => 'https://placehold.co/200x120', // Placeholder image 1
    'image2' => 'https://placehold.co/200x120', // Placeholder image 2
    'imageCount' => 2 // Number of additional images beyond the first two
])

<div class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <h2 class="text-main text-2xl font-semibold font-['Poppins']">Daily Log</h2>

    <ul class="list-disc pl-5 space-y-2 text-main text-base font-normal font-['Poppins']">
        @foreach ($logs as $log)
            <li>{{ $log }}</li>
        @endforeach
    </ul>

    <div class="space-y-3">
        <h3 class="text-main text-xl font-semibold font-['Poppins']">Image</h3>
        <div class="flex gap-4">
            <img src="{{ $image1 }}" alt="Daily log image 1" class="w-[180px] h-[120px] object-cover rounded-[15px]" loading="lazy">
            <div class="relative">
                <img src="{{ $image2 }}" alt="Daily log image 2" class="w-[180px] h-[120px] object-cover rounded-[15px]" loading="lazy">
                @if ($imageCount > 0)
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-[15px]">
                        <span class="text-white text-2xl font-bold">+{{ $imageCount }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>