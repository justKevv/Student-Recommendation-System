@props([
    'userId' => null,
    'certificateId' => null,
    'certificateName' => '',
    'issuingOrganization' => '',
    'date' => '',
    'description' => '',
    'imagePath' => '',
    'certificateUrl' => '',
    'modalType' => 'add' // 'add' or 'edit'
])

@php
    $modalId = $modalType === 'edit'
        ? "hs-vertically-centered-modal-edit-certificate-{$certificateId}-area-{$userId}"
        : "hs-vertically-centered-modal-add-certificate-area-{$userId}";

    $modalTitle = $modalType === 'edit' ? 'Edit Certificate' : 'Add New Certificate';
    $buttonText = $modalType === 'edit' ? 'Update Certificate' : 'Add Certificate';

    $formAction = $modalType === 'edit'
        ? route('student.certificate.update', $certificateId)
        : route('student.certificate.store');

    $formMethod = $modalType === 'edit' ? 'PUT' : 'POST';
@endphp

<div id="{{ $modalId }}"
    class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
    role="dialog" tabindex="-1" aria-labelledby="{{ $modalId }}-label">
    <div
        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 min-h-[calc(100%-56px)] flex items-center justify-center">
        <div
            class="flex flex-col w-full max-w-2xl bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h3 id="{{ $modalId }}-label" class="font-bold text-gray-800">
                    {{ $modalTitle }}
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#{{ $modalId }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data"
                id="certificate-form-{{ $modalType }}-{{ $certificateId ?? 'new' }}-{{ $userId }}">
                @csrf
                @if($modalType === 'edit')
                    @method('PUT')
                @endif

                <div class="p-4 overflow-y-auto max-h-96">
                    <!-- Certificate Name -->
                    <div class="mb-4">
                        <label for="certificate_name_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Certificate Name</label>
                        <input type="text"
                               name="certificate_name"
                               id="certificate_name_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('certificate_name', $certificateName) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="Enter certificate name"
                               required>
                    </div>

                    <!-- Issuing Organization -->
                    <div class="mb-4">
                        <label for="issuing_organization_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Issuing Organization</label>
                        <input type="text"
                               name="issuing_organization"
                               id="issuing_organization_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('issuing_organization', $issuingOrganization) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="Enter issuing organization"
                               required>
                    </div>

                    <!-- Issue Date -->
                    <div class="mb-4">
                        <label for="issue_date_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Issue Date</label>
                        <input type="date"
                               name="issue_date"
                               id="issue_date_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('issue_date', $date) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="certificate_description_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description"
                                  id="certificate_description_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                                  rows="3"
                                  class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                  placeholder="Describe the certificate...">{{ old('description', $description) }}</textarea>
                    </div>

                    <!-- Certificate Image -->
                    <div class="mb-4">
                        <label for="certificate_image_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Certificate Image</label>
                        <input type="file"
                               name="image"
                               id="certificate_image_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                               accept="image/*"
                               class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        @if($modalType === 'edit' && $imagePath)
                            <p class="mt-1 text-xs text-gray-500">Current image: {{ basename($imagePath) }}</p>
                        @endif
                    </div>

                    <!-- Certificate URL -->
                    <div class="mb-4">
                        <label for="certificate_url_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Certificate URL (Verification Link)</label>
                        <input type="url"
                               name="certificate_url"
                               id="certificate_url_{{ $modalType }}_{{ $certificateId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('certificate_url', $certificateUrl) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="https://verify.example.com/certificate/12345">
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#{{ $modalId }}">
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
