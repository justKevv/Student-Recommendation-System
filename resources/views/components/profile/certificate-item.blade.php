@props([
    'certificateId' => null,
    'userId' => null,
    'certificateName' => '',
    'issuingOrganization' => '',
    'date' => '',
    'description' => '',
    'imagePath' => null,
    'certificateUrl' => null
])

<div class="relative mt-4 group">
    <!-- Edit and Delete buttons for individual certificate -->
    @if($certificateId && $userId)
        <div class="absolute top-0 right-0 z-10 flex space-x-1 opacity-0 group-hover:opacity-100">
            @if (auth()->user()->role != 'admin' && auth()->user()->id == $userId)
            <!-- Edit button -->
            <button
                class="p-2 transition-colors duration-200 bg-white border border-gray-300 rounded-full shadow-sm hover:bg-gray-200"
                aria-haspopup="dialog" aria-expanded="false"
                aria-controls="hs-vertically-centered-modal-edit-certificate-{{ $certificateId }}-area-{{ $userId }}"
                data-hs-overlay="#hs-vertically-centered-modal-edit-certificate-{{ $certificateId }}-area-{{ $userId }}"
                title="Edit Certificate">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/fluent_edit-16-filled.png" class="w-3.5 h-3.5" alt="Edit">
            </button>

            <!-- Delete button -->
            <x-profile.delete-button
                :route="route('student.certificate.destroy', $certificateId)"
                :itemId="$certificateId"
                itemType="certificate"
                title="Delete Certificate"
                description="Are you sure you want to delete this certificate? This action cannot be undone." />
            @endif
        </div>
    @endif

    <div class="flex flex-col gap-4 lg:flex-row">
        {{-- Certificate Image --}}
        @if($imagePath)
            <div class="flex-shrink-0 lg:w-1/3">
                <img src="{{ $imagePath }}" alt="{{ $certificateName }}" class="object-cover w-full h-48 border border-gray-200 rounded-lg lg:h-32">
            </div>
        @endif

        {{-- Certificate Content --}}
        <div class="flex-1">
            <div class="flex items-start justify-between">
                {{-- Certificate Info with proper right margin to avoid button overlap --}}
                <div class="{{ ($certificateId && $userId) ? 'pr-20' : '' }}">
                    <h3 class="text-lg font-semibold text-gray-800 font-['Poppins']">{{ $certificateName }}</h3>
                    <p class="text-md text-gray-600 font-['Poppins'] mt-1">{{ $issuingOrganization }}</p>
                    <p class="text-sm text-gray-500 font-['Poppins'] mt-1">{{ $date }}</p>
                </div>
            </div>

            {{-- Credential Link - Moved below certificate info to avoid overlap --}}
            @if($certificateUrl)
                <div class="mt-2">
                    <a href="{{ $certificateUrl }}" target="_blank" class="text-redgoon hover:text-redgoon2 text-sm font-medium font-['Poppins']">
                        <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd"/>
                        </svg>
                        View Credential
                    </a>
                </div>
            @endif

            {{-- Certificate Description --}}
            @if($description)
                <p class="text-sm text-gray-700 font-['Poppins'] mt-3 leading-relaxed">{{ Str::limit($description, 200) }}</p>
            @endif
        </div>
    </div>
</div>
