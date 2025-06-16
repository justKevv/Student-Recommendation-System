@props([
    'route' => null,
    'itemId' => null,
    'itemType' => 'item',
    'title' => 'Delete Item',
    'description' => 'Are you sure you want to delete this item?'
])

@if($route && $itemId)
<!-- Delete Modal Form -->
<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <div id="hs-delete-modal-{{ $itemType }}-{{ $itemId }}"
         class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
         role="dialog" tabindex="-1" aria-labelledby="hs-delete-modal-{{ $itemType }}-{{ $itemId }}-label">
        <div class="m-3 opacity-0 transition-all ease-out hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
            <div class="flex flex-col bg-white rounded-xl border shadow-sm pointer-events-auto">
                <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-delete-modal-{{ $itemType }}-{{ $itemId }}-label" class="font-bold text-gray-800">
                        {{ $title }}
                    </h3>
                    <button type="button"
                            class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#hs-delete-modal-{{ $itemType }}-{{ $itemId }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 6-12 12"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4 text-center">
                    <p class="text-gray-800">
                        {{ $description }}
                    </p>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                            class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-delete-modal-{{ $itemType }}-{{ $itemId }}">
                        Cancel
                    </button>
                    <button type="submit"
                            class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-redgoon rounded-lg border border-transparent hover:bg-redgoon2 focus:outline-none focus:bg-redgoon2 disabled:opacity-50 disabled:pointer-events-none">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
