@extends('student.layout.app')

@section('content')
    <div class="max-w-6xl p-6 mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Certifications</h1>
                <p class="mt-2 text-gray-600">Showcase your professional certifications and achievements</p>
            </div>
            <div class="flex items-center gap-4">
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-certificate-modal"
                    data-hs-overlay="#hs-add-certificate-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Certificate
                </button>
                <a href="{{ route('student.cv') }}"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg gap-x-2 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </a>
            </div>
        </div>

        @if ($certificates && $certificates->count() > 0)
            <!-- Certificates List -->
            <div id="certificatesList" class="space-y-6">
                @foreach ($certificates as $certificate)
                    <div class="p-6 transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $certificate->title }}</h3>
                                <p class="mt-1 text-sm text-gray-600">Issued by <span
                                        class="font-medium">{{ $certificate->issuer }}</span></p>
                                <p class="mt-1 text-sm text-gray-500">Issue Date:
                                    {{ \Carbon\Carbon::parse($certificate->issue_date)->format('F Y') }}</p>
                                <p class="mt-2 text-sm text-gray-700">{{ $certificate->description }}</p>
                                @if ($certificate->certificate_link)
                                    <div class="mt-3">
                                        <a href="{{ $certificate->certificate_link }}" target="_blank"
                                            class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full hover:bg-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                </path>
                                            </svg>
                                            View Certificate
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2 ml-4">
                                @if ($certificate->certificate_image)
                                    <img src="{{ $certificate->certificate_image }}" alt="{{ $certificate->title }}"
                                        class="object-cover w-24 h-24 rounded-lg">
                                @endif
                                <div class="inline-flex relative hs-dropdown [--placement:bottom-right]">
                                    <button id="hs-dropdown-custom-icon-trigger-{{ $certificate->id }}" type="button"
                                        class="z-20 flex items-center justify-center text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-lg hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="flex-none text-gray-600 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                        </svg>
                                    </button>

                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-lg mt-2 z-[999] border border-gray-200"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="hs-dropdown-custom-icon-trigger-{{ $certificate->id }}">
                                        <div class="p-1 space-y-0.5">
                                            <button type="button"
                                                class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-red-600 rounded-lg select-none hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-delete-certificate-modal-{{ $certificate->id }}"
                                                data-hs-overlay="#hs-delete-certificate-modal-{{ $certificate->id }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Delete Certificate Modals --}}
            @foreach ($certificates as $certificate)
                <form action="{{ route('student.certificate.onboarding.destroy', $certificate->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div id="hs-delete-certificate-modal-{{ $certificate->id }}"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
                        role="dialog" tabindex="-1"
                        aria-labelledby="hs-delete-certificate-modal-{{ $certificate->id }}-label">
                        <div
                            class="m-3 transition-all ease-out opacity-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
                            <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
                                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                                    <h3 id="hs-delete-certificate-modal-{{ $certificate->id }}-label"
                                        class="font-bold text-gray-800">
                                        Confirm Delete
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-label="Close"
                                        data-hs-overlay="#hs-delete-certificate-modal-{{ $certificate->id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m18 6-12 12"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4 overflow-y-auto text-center">
                                    <p class="text-gray-800">
                                        Are you sure you want to delete <strong>{{ $certificate->title }}</strong>? This
                                        action cannot be undone.
                                    </p>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-delete-certificate-modal-{{ $certificate->id }}">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg gap-x-2 hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @else
            <div class="py-12 text-center">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                    </svg>
                </div>
                <h3 class="mb-2 text-lg font-medium text-gray-900">No certificates added yet</h3>
                <p class="mb-6 text-gray-500">Start showcasing your professional achievements by adding your certifications
                </p>
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-certificate-modal"
                    data-hs-overlay="#hs-add-certificate-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add your first certificate
                </button>
            </div>
        @endif
    </div>

    <div id="hs-add-certificate-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-certificate-modal-label">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
            <div class="flex flex-col w-full bg-white border border-gray-200 shadow-sm pointer-events-auto rounded-xl">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-add-certificate-modal-label" class="font-bold text-gray-800">
                        Add Certificate
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-add-certificate-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="{{ route('student.certificate.onboarding.store') }}" method="POST" id="certificateForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium">Certificate Title <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="title" name="title"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="e.g., AWS Certified Solutions Architect" required>
                            </div>
                            <div>
                                <label for="issuer" class="block mb-2 text-sm font-medium">Issuing Organization <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="issuer" name="issuer"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="e.g., Amazon Web Services" required>
                            </div>
                            <div>
                                <label for="issue_date" class="block mb-2 text-sm font-medium">Issue Date <span
                                        class="text-red-500">*</span></label>
                                <input type="date" id="issue_date" name="issue_date"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium">Description <span
                                        class="text-red-500">*</span></label>
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Describe what this certification demonstrates..." required></textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="certificate_link" class="block mb-2 text-sm font-medium">Certificate
                                    Link</label>
                                <input type="url" id="certificate_link" name="certificate_link"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="https://verify.certificate.com/your-certificate">
                                <p class="mt-1 text-xs text-gray-500">Link to verify or view the certificate online</p>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="certificate_image" class="block mb-2 text-sm font-medium">Certificate
                                    Image</label>
                                <input type="file" id="certificate_image" name="certificate_image"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    accept="image/*">
                                <p class="mt-1 text-xs text-gray-500">Upload an image of your certificate (optional)</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6 gap-x-2">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-add-certificate-modal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Add Certificate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
