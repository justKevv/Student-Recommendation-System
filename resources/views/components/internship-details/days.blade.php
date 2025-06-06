@props([
    'days' => 8,
    'format' => 'days'
])

{{-- resources/views/components/interman/days.blade.php --}}
<div class="flex overflow-hidden flex-col w-20 bg-white rounded-lg shadow-md">
    {{-- Bagian atas untuk angka (background putih) --}}
    <div class="flex flex-grow justify-center items-center py-4">
        <p class="text-4xl font-bold text-neutral-900">{{ $days }}</p>
    </div>
    {{-- Bagian bawah untuk "Days Left" (background abu-abu muda) --}}
    <div class="flex justify-center items-center py-2 bg-neutral-100">
        <p class="text-xs text-neutral-800">{{ Str::ucfirst($format) }} Left</p>
    </div>
</div>
