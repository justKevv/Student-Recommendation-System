@extends('student.layout.app')

@section('content')
    <div class="py-8 min-h-screen">
        <div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">
            <!-- Header -->
        <div class="mb-8">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">CV Management</h1>
                    <p class="mt-2 text-gray-600">Upload and manage your curriculum vitae</p>
                </div>
                <a href="{{ route('redirect_to_dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Go to Dashboard
                </a>
            </div>
        </div>

            <!-- Current CV Section -->
            <div class="mb-6 bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="p-6">
                    <h2 class="mb-4 text-xl font-semibold text-gray-900">Current CV</h2>
                    @if (auth()->user()->student && auth()->user()->student->cv_path)
                        <div class="flex justify-between items-center p-4 bg-green-50 rounded-lg border border-green-200">
                            <div class="flex items-center">
                                <svg class="mr-3 w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="font-medium text-green-900">CV Uploaded</p>
                                    <p class="text-sm text-green-700">Your CV is ready for applications</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ auth()->user()->student->cv_path }}" target="_blank"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-green-700 bg-white rounded-md border border-green-300 shadow-sm hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    View
                                </a>
                                <button onclick="openUploadModal()"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-blue-600 rounded-md border border-transparent hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Replace
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="py-8 text-center">
                            <svg class="mx-auto w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No CV uploaded</h3>
                            <p class="mt-1 text-sm text-gray-500">Upload your CV to apply for internships</p>
                            <div class="mt-6">
                                <button onclick="openUploadModal()"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md border border-transparent shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                    </svg>
                                    Upload CV
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- CV Guidelines -->
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                <div class="p-6">
                    <h2 class="mb-4 text-xl font-semibold text-gray-900">CV Guidelines</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <h3 class="mb-2 font-medium text-gray-900">File Requirements</h3>
                            <ul class="space-y-1 text-sm text-gray-600">
                                <li>• PDF format only</li>
                                <li>• Maximum file size: 5MB</li>
                                <li>• Clear and readable text</li>
                                <li>• Professional formatting</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="mb-2 font-medium text-gray-900">Content Suggestions</h3>
                            <ul class="space-y-1 text-sm text-gray-600">
                                <li>• Contact information</li>
                                <li>• Education background</li>
                                <li>• Work experience</li>
                                <li>• Skills and certifications</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload CV Modal -->
    <div id="uploadCvModal" class="hidden overflow-y-auto fixed inset-0 z-50 w-full h-full bg-gray-600 bg-opacity-50">
        <div class="relative top-20 p-5 mx-auto w-96 bg-white rounded-md border shadow-lg">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Upload CV</h3>
                    <button onclick="closeUploadModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <form id="uploadCvForm" action="{{ route('student.cv.upload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="cv_file" class="block mb-2 text-sm font-medium text-gray-700">Select CV File</label>
                        <div
                            class="flex justify-center px-6 pt-5 pb-6 mt-1 rounded-md border-2 border-gray-300 border-dashed transition-colors hover:border-gray-400">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto w-12 h-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="cv_file"
                                        class="relative font-medium text-blue-600 bg-white rounded-md cursor-pointer hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input id="cv_file" name="cv_file" type="file" class="sr-only"
                                            accept=".pdf" required onchange="updateFileName(this)">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PDF up to 5MB</p>
                                <p id="fileName" class="hidden text-sm font-medium text-gray-900"></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeUploadModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md border border-gray-300 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md border border-transparent hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Upload CV
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openUploadModal() {
            document.getElementById('uploadCvModal').classList.remove('hidden');
        }

        function closeUploadModal() {
            document.getElementById('uploadCvModal').classList.add('hidden');
            document.getElementById('uploadCvForm').reset();
            document.getElementById('fileName').classList.add('hidden');
        }

        function updateFileName(input) {
            const fileName = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                fileName.textContent = input.files[0].name;
                fileName.classList.remove('hidden');
            } else {
                fileName.classList.add('hidden');
            }
        }

        // Close modal when clicking outside
        document.getElementById('uploadCvModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeUploadModal();
            }
        });
    </script>
@endsection
