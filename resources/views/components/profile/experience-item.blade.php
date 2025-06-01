@props([
    'title' => '',
    'company' => '',
    'employmentType' => '',
    'duration' => '',
    'descriptionPoints' => []
])

<div class="mt-4">
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
