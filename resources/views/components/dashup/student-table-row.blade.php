@props([
    'name' => 'Student Name',
    'role' => 'Role',
    'completed' => 0, // Number of completed items
    'total' => 7,     // Total number of items
    'profileImage' => 'https://placehold.co/50x50', // Default profile image
])

<div class="grid grid-cols-12 items-center px-4 py-3 mb-2 bg-white rounded-full border border-gray-200">
    {{-- Column 1: Student Info (Name & Role) --}}
    <div class="flex col-span-6 items-center space-x-4">
        <img class="object-cover w-10 h-10 rounded-full" src="{{ $profileImage }}" alt="{{ $name }}'s profile">
        <div>
            <p class="text-base font-medium text-main">{{ $name }}</p>
            <p class="text-xs text-gray-500">{{ $role }}</p>
        </div>
    </div>

    {{-- Column 2: Progress Bar --}}
    <div class="flex col-span-4 justify-end items-center space-x-3">
        <div class="text-sm text-gray-600 whitespace-nowrap">Completed: {{ $completed }}/{{ $total }}</div>
        <div class="flex space-x-1">
            @for ($i = 0; $i < $total; $i++)
                <div class="w-2 h-5 rounded-sm {{ $i < $completed ? 'bg-redgoon' : 'bg-gray-300' }}"></div>
            @endfor
        </div>
    </div>

    {{-- Column 3: Detail Button --}}
    <div class="flex col-span-2 justify-end">
        <button class="px-4 py-1.5 text-sm text-white rounded-full bg-main hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
            Detail
        </button>
    </div>
</div>
