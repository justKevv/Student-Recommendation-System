@props([
    'positions' => [
        ['title' => 'Software Engineer', 'type' => 'Full-time', 'location' => 'Remote', 'due_date' => '2024-02-15'],
        ['title' => 'Data Analyst', 'type' => 'Part-time', 'location' => 'On-site', 'due_date' => '2024-02-20'],
        ['title' => 'UI/UX Designer', 'type' => 'Contract', 'location' => 'Hybrid', 'due_date' => '2024-02-25'],
    ],
])

<div class="w-full">
    <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
        <div class="absolute left-0 inset-y-4 w-2 mb-25 bg-yellowgoon"></div>

        <div class="p-6 ml-2">
            <h2 class="mb-4 text-xl font-bold text-main">Available Positions</h2>
            <div class="space-y-3">
                @if (count($positions) > 0)
                    @foreach ($positions as $position)
                        <a href="{{ route('detail.job', $position->slug) }}"
                            class="flex justify-between items-center p-3 rounded-lg transition-colors duration-200 bg-neutral-50 hover:bg-neutral-100">
                            <div class="flex-1">
                                <h3 class="font-semibold text-main">{{ $position['title'] }}</h3>
                                <p class="text-sm text-redgoon">Open Until:
                                    {{ \Carbon\Carbon::parse($position['open_until'])->format('M d, Y') }}</p>
                            </div>
                            <div class="text-right">
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium rounded-full text-neutral-800 bg-neutral-200">
                                    {{ Str::ucfirst(str_replace('_', '-', $position['type'])) }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="flex justify-center items-center p-8 text-center">
                        <div>
                            <h3 class="mb-1 text-lg font-medium text-neutral-600">No Positions Available</h3>
                            <p class="text-sm text-neutral-500">This company is not currently hiring. Check back later
                                for new opportunities.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
