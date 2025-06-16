@props([
    'route' => null,
    'itemId' => null,
    'itemType' => 'item',
    'title' => 'Delete Item',
    'description' => 'Are you sure you want to delete this item?',
    'buttonClass' => 'p-2 transition-colors duration-200 border border-red-300 rounded-full hover:bg-red-100',
    'iconClass' => 'w-4 h-4 text-redgoon'
])

@if($route && $itemId)
    <!-- Delete Button Only -->
    <button
        type="button"
        class="{{ $buttonClass }}"
        aria-haspopup="dialog" aria-expanded="false"
        aria-controls="hs-delete-modal-{{ $itemType }}-{{ $itemId }}"
        data-hs-overlay="#hs-delete-modal-{{ $itemType }}-{{ $itemId }}"
        title="Delete {{ ucfirst($itemType) }}">
        <svg class="{{ $iconClass }}" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
    </button>
@endif
