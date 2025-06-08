@props([
    'company' => 'Jasa Ayah Corporation',
    'img' => 'https://placehold.co/80x80/E0E7FF/4F46E5?text=JA'
])

<div class="overflow-hidden relative p-0 bg-white rounded-xl">
    <div class="absolute inset-y-0 left-0 w-2 bg-yellowgoon"></div>
    <div class="relative p-6 pb-8 ml-2">
        <div class="flex items-center p-4 space-x-4">
            <img src="{{ $img }}{{ strpos($img, '?') !== false ? '&' : '?' }}t={{ time() }}" alt="Jasa Ayah Corp Logo"
                class="rounded-full w-25 h-25">
            <h1 class="text-4xl font-semibold text-main">{{ $company }}</h1>
        </div>
    </div>
</div>
