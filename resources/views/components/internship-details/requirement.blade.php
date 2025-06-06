@props([
    'requirements' => []
])
<div class="pl-10">
  <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
      <div class="absolute left-0 inset-y-4 mb-52 w-2 bg-redgoon"></div>
      <div class="p-6 ml-2">
          <h2 class="mb-4 text-xl font-semibold text-main">Requirement</h2>
          <ul class="space-y-2 text-base list-disc list-inside text-neutral-700">
            @foreach ($requirements as $requirement)
                <li>{{ $requirement }}</li>
            @endforeach
          </ul>
      </div>
  </div>
</div>
