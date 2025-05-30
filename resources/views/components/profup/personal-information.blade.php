{{-- resources/views/components/profup/personal-information.blade.php --}}
@props([
    'firstName' => '',
    'lastName' => '',
    'supervisorId' => '',
    'emailAddress' => '',
    'phoneNumber' => '',
    'major' => ''
])

<div class="bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Personal Information</h2>
        <button class="inline-flex items-center gap-2 px-4 py-2 rounded-[30px] text-sm font-medium bg-main text-white hover:bg-gray-200 transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            Edit
        </button>
    </div>

    <hr class="border-neutral-200 mb-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4 gap-x-8">
        {{-- First Name --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">First Name</span>
            <span class="block text-md text-gray-800">{{ $firstName }}</span>
        </div>

        {{-- Last Name --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Last Name</span>
            <span class="block text-md text-gray-800">{{ $lastName }}</span>
        </div>

        {{-- Supervisor ID --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Supervisor ID</span>
            <span class="block text-md text-gray-800">{{ $supervisorId }}</span>
        </div>

        {{-- Email Address --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Email Address</span>
            <span class="block text-md text-gray-800">{{ $emailAddress }}</span>
        </div>

        {{-- Phone Number --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Phone Number</span>
            <span class="block text-md text-gray-800">{{ $phoneNumber }}</span>
        </div>

        {{-- Major --}}
        <div>
            <span class="block text-sm font-medium text-gray-500">Major</span>
            <span class="block text-md text-gray-800">{{ $major }}</span>
        </div>
    </div>
</div>