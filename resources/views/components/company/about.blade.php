@props([
    'company' => 'Jasa Ayah',
    'description' => 'Jasa Ayah Corporation was established in April 2023 as part of the Geniee, Inc. group, a publicly listed company. We are driven by a vision to enhance digital experiences through innovative, user-centered UI/UX design.
            Our core focus is delivering intuitive, functional, and visually appealing UI/UX solutions across various industries, both locally and globally.'
])

<div class="py-0 pl-0">
  <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
      <div class="absolute left-0 inset-y-4 w-2 mb-25 bg-yellowgoon"></div>

      <div class="p-6 ml-2">
          <h2 class="mb-4 text-xl font-bold text-gray-800">About {{ $company }}</h2>
          <p class="text-base leading-relaxed text-gray-700">
              {{ $description }}
          </p>
      </div>
  </div>
</div>
