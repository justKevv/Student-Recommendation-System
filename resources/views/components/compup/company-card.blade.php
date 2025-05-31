{{-- resources/views/components/compup/company-card.blade.php --}}
@props([
    'city',
    'companyName',
    'appliedCount',
    'logoUrl',
    'logoBgColor' => 'bg-gray-200', // Pastikan prop ini ada dan memiliki nilai default
])

<div class="bg-white rounded-[30PX] p-4 flex items-center justify-between shadow-sm cursor-pointer company-card"
    data-city="{{ $city }}"
    data-company-name="{{ $companyName }}"
    data-logo-url="{{ $logoUrl }}"
    data-logo-bg-color="{{ $logoBgColor }}">
    <div class="flex flex-col flex-grow">
        <p class="text-xs text-gray-500 mb-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
            {{ $city }}
        </p>
        <h3 class="text-xl font-bold text-gray-800">{{ $companyName }}</h3>
        <p class="text-sm text-gray-600">{{ $appliedCount }} Applied</p>
    </div>
    <div class="flex-shrink-0 w-16 h-16 rounded-full flex items-center justify-center {{ $logoBgColor }} ml-4">
        <img src="{{ $logoUrl }}" alt="{{ $companyName }} logo" class="w-10 h-10 object-contain">
    </div>
</div>