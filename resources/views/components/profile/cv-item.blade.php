@props([
    'cvName' => 'User_CV.pdf', // Default CV name
    'cvPath' => null, // Default path, should be a URL to the PDF
])

@if ($cvPath)
    <div class="bg-white p-6 rounded-xl shadow-lg font-['Poppins'] flex justify-between items-center">
        <span class="font-medium text-gray-700">{{ $cvName }}</span>
        <a href="{{ $cvPath }}" target="_blank" class="text-gray-400 hover:text-gray-600" title="Open CV in new tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
            </svg>
        </a>
    </div>
@endif
