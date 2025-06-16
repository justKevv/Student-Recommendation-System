@props([
    'modal_type' => 'default',
   'userId' => null,
])

<button class="p-2 rounded-full border border-gray-300 transition-colors duration-200 hover:bg-gray-200"
    aria-haspopup="dialog" aria-expanded="false"
    aria-controls="hs-vertically-centered-modal-add-{{ $modal_type }}-area-{{ $userId }}"
    data-hs-overlay="#hs-vertically-centered-modal-add-{{ $modal_type }}-area-{{ $userId }}">
    <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/mingcute_add-fill.png" alt="" class="w-5 h-5">
</button>
