{{-- resources/views/components/profup/personal-information.blade.php --}}
@props([
    'firstName' => '',
    'lastName' => '',
    'supervisorId' => '',
    'emailAddress' => '',
    'phoneNumber' => '',
    'major' => '',
    'userId' => null
])

<div class="bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Personal Information</h2>
        <button class="inline-flex items-center gap-2 px-4 py-2 rounded-[30px] text-sm font-medium bg-main text-white hover:bg-gray-700 transition-colors duration-200" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-personal-modal-{{ $userId }}" data-hs-overlay="#hs-personal-modal-{{ $userId }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            Edit
        </button>
    </div>

    <hr class="mb-6 border-neutral-200">

    <div class="grid grid-cols-1 gap-y-4 gap-x-8 md:grid-cols-3">
        {{-- First Name --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">First Name</span>
            <span class="block text-gray-800 text-md">{{ $firstName }}</span>
        </div>

        {{-- Last Name --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Last Name</span>
            <span class="block text-gray-800 text-md">{{ $lastName }}</span>
        </div>

        {{-- Supervisor ID --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Supervisor ID</span>
            <span class="block text-gray-800 text-md">{{ $supervisorId }}</span>
        </div>

        {{-- Email Address --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Email Address</span>
            <span class="block text-gray-800 text-md">{{ $emailAddress }}</span>
        </div>

        {{-- Phone Number --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Phone Number</span>
            <span class="block text-gray-800 text-md">{{ $phoneNumber }}</span>
        </div>

        {{-- Major --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Major</span>
            <span class="block text-gray-800 text-md">{{ $major }}</span>
        </div>
    </div>
</div>

<div id="hs-personal-modal-{{ $userId }}" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 pointer-events-none hs-overlay size-full start-0 z-80" role="dialog" tabindex="-1" aria-labelledby="hs-personal-modal-{{ $userId }}-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
      <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 pointer-events-auto shadow-2xs">
        <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
          <h3 id="hs-personal-modal-{{ $userId }}-label" class="font-bold text-gray-800">
            Edit Personal Information
          </h3>
          <button type="button" class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-personal-modal-{{ $userId }}">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>
        </div>
        <form action="{{ route('profile.edit') }}" method="post">
            @csrf
            @method('PUT')

            {{-- Display validation errors --}}
            @if ($errors->any())
                <div class="p-4 mb-4 bg-red-50 rounded-md border border-red-200">
                    <ul class="text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Display success message --}}
            @if (session('success'))
                <div class="p-4 mb-4 bg-green-50 rounded-md border border-green-200">
                    <p class="text-sm text-green-600">{{ session('success') }}</p>
                </div>
            @endif

            <div class="overflow-y-auto p-4 space-y-4">
                <div>
                    <label for="email-input-{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <input type="email" id="email-input-{{ $userId }}" name="email" class="px-3 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellowgoon @error('email') border-red-500 @enderror" placeholder="Enter email address" value="{{ old('email', $emailAddress) }}">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone-input-{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">
                        Phone Number
                    </label>
                    <input type="tel" id="phone-input-{{ $userId }}" name="phone" class="px-3 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellowgoon @error('phone') border-red-500 @enderror" placeholder="Enter phone number" value="{{ old('phone', $phoneNumber) }}">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
              <button type="button" class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-personal-modal-{{ $userId }}">
                Close
              </button>
              <button type="submit" class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent bg-main text-yellowgoon hover:bg-gray-700 focus:outline-hidden focus:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none">
                Save changes
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
