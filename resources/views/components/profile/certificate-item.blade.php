@props([
    'certificateName' => '',
    'issuingOrganization' => '',
    'date' => '',
    'description' => '',
    'imagePath' => null,
    'certificateUrl' => null
])

<div class="mt-4">
    <div class="flex flex-col gap-4 lg:flex-row">
        {{-- Certificate Image --}}
        @if($imagePath)
            <div class="flex-shrink-0 lg:w-1/3">
                <img src="{{ $imagePath }}" alt="{{ $certificateName }}" class="object-cover w-full h-48 rounded-lg border border-gray-200 lg:h-32">
            </div>
        @endif

        {{-- Certificate Content --}}
        <div class="flex-1">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 font-['Poppins']">{{ $certificateName }}</h3>
                    <p class="text-md text-gray-600 font-['Poppins'] mt-1">{{ $issuingOrganization }}</p>
                    <p class="text-sm text-gray-500 font-['Poppins'] mt-1">{{ $date }}</p>
                </div>

                {{-- Credential Link --}}
                @if($certificateUrl)
                    <div class="ml-4">
                        <a href="{{ $certificateUrl }}" target="_blank" class="text-redgoon hover:text-redgoon2 text-sm font-medium font-['Poppins']">
                            <svg class="inline mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd"/>
                            </svg>
                            View
                        </a>
                    </div>
                @endif
            </div>

            {{-- Certificate Description --}}
            @if($description)
                <p class="text-sm text-gray-700 font-['Poppins'] mt-3 leading-relaxed">{{ Str::limit($description, 200) }}</p>
            @endif
        </div>
    </div>
</div>
