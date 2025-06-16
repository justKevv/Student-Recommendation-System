@props([
    'due' => '8 Days Left'
])

@php
    // Check if the internship is closed
    if (strtolower($due) === 'closed') {
        $number = '';
        $text = 'Closed';
    } else {
        // Extract number and text from the due string
        preg_match('/(\d+)\s*(.*)/', $due, $matches);
        $number = $matches[1] ?? '0';
        $text = $matches[2] ?? 'Days Left';
    }
@endphp

{{-- resources/views/components/interman/days.blade.php --}}
<div class="flex overflow-hidden flex-col w-20 bg-white rounded-lg shadow-md">
    @if(strtolower($due) === 'closed')
        {{-- Closed state design --}}
        <div class="flex flex-grow justify-center items-center py-4 bg-red-50">
            <p class="text-sm font-bold text-red-600">CLOSED</p>
        </div>
    @else
        {{-- Active state with number --}}
        <div class="flex flex-grow justify-center items-center py-4">
            <p class="text-4xl font-bold text-neutral-900">{{ $number }}</p>
        </div>
        {{-- Bagian bawah untuk "Days Left" (background abu-abu muda) --}}
        <div class="flex justify-center items-center py-2 bg-neutral-100">
            <p class="text-xs text-neutral-800">{{ ucfirst($text) }}</p>
        </div>
    @endif
</div>
