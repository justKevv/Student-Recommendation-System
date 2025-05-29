@props([
    'name' => 'Student Name',
    'role' => 'Role',
    'completed' => 0, // Number of completed items
    'total' => 7,     // Total number of items
    'profileImage' => 'https://placehold.co/50x50', // Default profile image
])

<div class="grid grid-cols-12 items-center py-3 px-4 bg-white rounded-full border border-gray-200 mb-2">
    {{-- Column 1: Student Info (Name & Role) --}}
    <div class="col-span-6 flex items-center space-x-4">
        <img class="w-10 h-10 rounded-full object-cover" src="{{ $profileImage }}" alt="{{ $name }}'s profile">
        <div>
            <p class="text-base font-medium text-gray-800">{{ $name }}</p>
            <p class="text-xs text-gray-500">{{ $role }}</p>
        </div>
    </div>

    {{-- Column 2: Progress Bar --}}
    <div class="col-span-4 flex items-center justify-end space-x-3">
        <div class="text-sm text-gray-600 whitespace-nowrap">Completed: {{ $completed }}/{{ $total }}</div>
        <div class="flex space-x-1">
            @for ($i = 0; $i < $total; $i++)
                <div class="w-4 h-2 rounded-sm {{ $i < $completed ? 'bg-red-500' : 'bg-gray-300' }}"></div>
            @endfor
        </div>
    </div>

    {{-- Column 3: Detail Button --}}
    <div class="col-span-2 flex justify-end">
        <button class="px-4 py-1.5 bg-gray-800 text-white text-sm rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
            Detail
        </button>
    </div>
</div>