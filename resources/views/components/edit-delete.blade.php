
@props([
    'internship_id' => null
])

<div class="inline-flex relative hs-dropdown [--placement:bottom-right]">
    <button id="hs-dropdown-custom-icon-trigger" type="button"
        class="flex z-20 justify-center items-center text-sm font-semibold text-gray-800 bg-white rounded-lg border border-gray-200 hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <svg class="flex-none text-gray-600 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="12" r="1" />
            <circle cx="12" cy="5" r="1" />
            <circle cx="12" cy="19" r="1" />
        </svg>
    </button>

    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-lg mt-2 z-[999] border border-gray-200"
        role="menu" aria-orientation="vertical"
        aria-labelledby="hs-dropdown-custom-icon-trigger">
        <div class="p-1 space-y-0.5">
            <button type="button"
                class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-gray-800 rounded-lg select-none hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-edit-internship-modal-{{ $internship_id }}"
                data-hs-overlay="#hs-edit-internship-modal-{{ $internship_id }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit
            </button>
            <button type="button"
                class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left rounded-lg select-none text-redgoon hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-delete-internship-modal-{{ $internship_id }}"
                data-hs-overlay="#hs-delete-internship-modal-{{ $internship_id }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
                Delete
            </button>
        </div>
    </div>
</div>


