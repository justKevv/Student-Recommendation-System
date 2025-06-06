@props([
    'description' => 'The image contains a job posting for a full-time UI/UX Designer role. It highlights that strong design skills are required, and having frontend development skills is a plus. The responsibilities include designing user interfaces and improving user experiences. The position is primarily based in Tokyo but offers some remote work flexibility.'
])

<div class="pl-10">
  <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
      <div class="absolute left-0 inset-y-4 w-2 mb-25 bg-redgoon"></div>

      <div class="p-6 ml-2">
          <h2 class="mb-4 text-xl font-semibold text-main">Role Description</h2>
          <p class="text-base leading-relaxed text-neutral-700">
              {{ $description }}
          </p>
      </div>
  </div>
</div>
