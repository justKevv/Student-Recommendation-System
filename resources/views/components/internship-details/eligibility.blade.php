@props([
    'eligibilities' => []
])

<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="pb-2 mb-4 text-xl font-semibold border-b border-neutral-200 text-main">Eligibility</h2>
    <ul class="space-y-2 list-disc list-inside text-neutral-700">
        @foreach ($eligibilities as $eligibility)
            <li>{{ $eligibility }}</li>
        @endforeach
    </ul>
</div>
