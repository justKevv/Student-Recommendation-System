@props([
    'positions' => [
        ['title' => 'Software Engineer', 'type' => 'Full-time', 'location' => 'Remote', 'due_date' => '2024-02-15'],
        ['title' => 'Data Analyst', 'type' => 'Part-time', 'location' => 'On-site', 'due_date' => '2024-02-20'],
        ['title' => 'UI/UX Designer', 'type' => 'Contract', 'location' => 'Hybrid', 'due_date' => '2024-02-25']
    ]
])

<div class="w-full">
    <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
        <div class="absolute left-0 inset-y-4 w-2 mb-25 bg-yellowgoon"></div>

        <div class="p-6 ml-2">
            <h2 class="mb-4 text-xl font-bold text-main">Available Positions</h2>
            <div class="space-y-3">
                @foreach($positions as $position)
                    <div class="flex justify-between items-center p-3 rounded-lg transition-colors duration-200 bg-neutral-50 hover:bg-neutral-100">
                        <div class="flex-1">
                            <h3 class="font-semibold text-main">{{ $position['title'] }}</h3>
                            <p class="text-sm text-redgoon">Due: {{ \Carbon\Carbon::parse($position['due_date'])->format('M d, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full text-neutral-800 bg-neutral-200">
                                {{ $position['location'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
