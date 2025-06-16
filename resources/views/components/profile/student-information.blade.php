@props([
    'studentId' => '2341720233',
    'studyProgram' => 'Informatics Engineering',
    'semester' => '4',
    'email' => '2341720233@student.polinema.ac.id',
    'phone' => '+628113682704',
    'userId' => null
])

<div class="w-[650px] bg-white rounded-[30px] shadow-md p-6 space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">Information</h2>
        <div class="flex space-x-3">
            @if (auth()->user()->role != 'admin' && auth()->user()->role != 'supervisor')
                <x-edit-icon modal_type="information" userId="{{ $userId }}"></x-edit-icon>
            @endif
        </div>
    </div>

    <div class="space-y-3">
        {{-- Student ID --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/material-symbols_id-card-outline.png" class="w-[24px]" alt="" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Student ID</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $studentId }}</span>
        </div>

        {{-- Study Program --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/solar_notebook-minimalistic-outline.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Study Program</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $studyProgram }}</span>
        </div>

        {{-- Semester --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/uil_calender.png?updatedAt=1748260155255" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Semester</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $semester }}</span>
        </div>
    </div>

    <hr class="border-neutral-200">

    <div class="space-y-3">
        {{-- Email --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/mdi_email-outline.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Email</span>
            </div>
            <a href="mailto:{{ $email }}" class="text-main text-sm font-medium font-['Poppins'] hover:underline">{{ $email }}</a>
        </div>

        {{-- Phone --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/ci_phone.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Phone</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $phone }}</span>
        </div>
    </div>
</div>

<div id="hs-vertically-centered-modal-edit-information-area-{{ $userId }}" class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80" role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-edit-information-area-{{ $userId }}-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
    <div class="flex flex-col w-full bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl">
      <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
        <h3 id="hs-vertically-centered-modal-edit-information-area-{{ $userId }}-label" class="font-bold text-gray-800">
          Edit Preferences
        </h3>
        <button type="button" class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal-edit-information-area-{{ $userId }}">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </button>
      </div>
      <form id="preferences-form" action="{{ route('profile.update-preferences') }}" method="POST">
      <div class="p-4 overflow-y-auto">
          @csrf
          <div class="space-y-4">
              <div>
                <label for="preferred_location" class="block mb-2 text-sm font-medium">Preferred Location</label>
                <input type="text" id="preferred_location" name="preferred_location" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-main focus:ring-main disabled:opacity-50 disabled:pointer-events-none" placeholder="Jakarta, etc." value="{{ auth()->user()->student->preferred_location ?? '' }}">
              </div>
              <div>
                <label for="preferred_internship_type" class="block mb-2 text-sm font-medium">Preferred Internship Type</label>
                <select id="preferred_internship_type" name="preferred_internship_type" class="py-2.5 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-main focus:ring-main disabled:opacity-50 disabled:pointer-events-none">
                    <option value="" {{ (auth()->user()->student->preferred_internship_type ?? '') == '' ? 'selected' : '' }}>Select type</option>
                    <option value="on_site" {{ (auth()->user()->student->preferred_internship_type ?? '') == 'on_site' ? 'selected' : '' }}>On-site</option>
                    <option value="remote" {{ (auth()->user()->student->preferred_internship_type ?? '') == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="hybrid" {{ (auth()->user()->student->preferred_internship_type ?? '') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
              </div>
          </div>
      </div>
      <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
        <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-vertically-centered-modal-edit-information-area-{{ $userId }}">
          Close
        </button>
        <button type="submit" form="preferences-form" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
          Save changes
        </button>
    </form>
    </div>
    </div>
  </div>
</div>
