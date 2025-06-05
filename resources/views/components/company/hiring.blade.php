@props([
    'positions' => [
        ['title' => 'Software Engineer', 'type' => 'Full-time', 'location' => 'Remote', 'deadline' => '2024-02-15'],
        ['title' => 'Data Analyst', 'type' => 'Part-time', 'location' => 'On-site', 'deadline' => '2024-02-20'],
        ['title' => 'UI/UX Designer', 'type' => 'Contract', 'location' => 'Hybrid', 'deadline' => '2024-02-25']
    ]
])

<div class="w-full">
    <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
        <div class="absolute left-0 inset-y-4 w-2 mb-25 bg-yellowgoon"></div>

        <div class="p-6 ml-2">
            <h2 class="mb-4 text-xl font-bold text-main">Available Positions</h2>
            <div class="space-y-3">
                @foreach($positions as $position)
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg duration-200 transiton-colors hover:bg-gray-100">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-800">{{ $position['title'] }}</h3>
                            <p class="mt-1 text-sm text-redgoon">
                                <span class="font-medium">Deadline:</span> {{ \Carbon\Carbon::parse($position['deadline'])->format('M d, Y') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-2 py-1 text-xs font-medium text-gray-800 bg-gray-200 rounded-full">
                                {{ $position['location'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
