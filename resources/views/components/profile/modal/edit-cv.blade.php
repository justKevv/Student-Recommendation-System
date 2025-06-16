@props([
    'userId' => null,
    'title' => 'Upload CV',
    'fileLabel' => 'Upload CV (PDF only)',
    'acceptTypes' => '.pdf',
    'inputName' => 'cv_file',
    'uploadRoute' => 'student.cv.upload',
    'maxFileSize' => '5MB',
    'buttonText' => 'Upload CV'
])

<div id="hs-vertically-centered-modal-edit-cv-area-{{ $userId }}"
    class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
    role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-edit-cv-area-{{ $userId }}-label">
    <div
        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 min-h-[calc(100%-56px)] flex items-center justify-center">
        <div
            class="flex flex-col w-full max-w-xl bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h3 id="hs-vertically-centered-modal-edit-cv-area-{{ $userId }}-label"
                    class="font-bold text-gray-800">
                    {{ $title }}
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal-edit-cv-area-{{ $userId }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route($uploadRoute) }}" method="POST" enctype="multipart/form-data"
                id="cv-upload-form-{{ $userId }}">
                @csrf
                <div class="p-4 overflow-y-auto">                    <label for="{{ $inputName }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">{{ $fileLabel }}</label>
                    <input type="file" name="{{ $inputName }}" id="{{ $inputName }}_{{ $userId }}" accept="{{ $acceptTypes }}"
                        class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                        required>
                    <p class="mt-1 text-xs text-gray-500">Maximum file size: {{ $maxFileSize }}</p>
                </div>
                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-vertically-centered-modal-edit-cv-area-{{ $userId }}">
                        Close
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 bg-main text-yellowgoon hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                        {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
