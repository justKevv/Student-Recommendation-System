{{-- resources/views/components/compup/company-detail-modal.blade.php --}}
<div id="company-detail-modal"
    class="fixed inset-0 bg-main/33 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-[29px] shadow-lg w-[800px] p-6 relative">
        <button id="close-company-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex items-center mb-4">
            <div id="modal-company-logo-wrapper" class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                <img id="modal-company-logo" class="w-8 h-8 object-contain" src="" alt="Logo Perusahaan">
            </div>
            <div>
                <p id="modal-company-city" class="text-sm text-gray-500"></p>
                <h3 id="modal-company-name" class="text-xl font-bold text-gray-800"></h3>
            </div>
        </div>

        <div id="modal-job-listings" class="flex flex-col gap-4 mt-6">
        </div>
    </div>
</div>