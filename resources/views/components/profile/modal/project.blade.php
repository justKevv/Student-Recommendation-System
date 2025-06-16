@props([
    'userId' => null,
    'projectId' => null,
    'title' => '',
    'description' => '',
    'media' => '',
    'technologies' => [],
    'projectUrl' => '',
    'githubUrl' => '',
    'modalType' => 'add' // 'add' or 'edit'
])

@php
    $modalId = $modalType === 'edit'
        ? "hs-vertically-centered-modal-edit-project-{$projectId}-area-{$userId}"
        : "hs-vertically-centered-modal-add-project-area-{$userId}";

    $modalTitle = $modalType === 'edit' ? 'Edit Project' : 'Add New Project';
    $buttonText = $modalType === 'edit' ? 'Update Project' : 'Add Project';

    $formAction = $modalType === 'edit'
        ? route('student.project.update', $projectId)
        : route('student.project.store');

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
                id="project-form-{{ $modalType }}-{{ $projectId ?? 'new' }}-{{ $userId }}">
                @csrf
                @if($modalType === 'edit')
                    @method('PUT')
                @endif

                <div class="p-4 overflow-y-auto max-h-96">
                    <!-- Project Title -->
                    <div class="mb-4">
                        <label for="project_title_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Project Title</label>
                        <input type="text"
                               name="title"
                               id="project_title_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('title', $title) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="Enter project title"
                               required>
                    </div>

                    <!-- Project Description -->
                    <div class="mb-4">
                        <label for="project_description_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description"
                                  id="project_description_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                                  rows="4"
                                  class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                  placeholder="Describe your project...">{{ old('description', $description) }}</textarea>
                    </div>

                    <!-- Project Image -->
                    <div class="mb-4">
                        <label for="project_media_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Project Image</label>
                        <input type="file"
                               name="media"
                               id="project_media_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                               accept="image/*"
                               class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        @if($modalType === 'edit' && $media)
                            <p class="mt-1 text-xs text-gray-500">Current image: {{ basename($media) }}</p>
                        @endif
                    </div>

                    <!-- Technologies -->
                    <div class="mb-4">
                        <label for="project_technologies_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Technologies (comma-separated)</label>
                        <input type="text"
                               name="technologies"
                               id="project_technologies_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('technologies', is_array($technologies) ? implode(', ', $technologies) : $technologies) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="e.g., Laravel, Vue.js, MySQL, Docker">
                    </div>

                    <!-- Project URL -->
                    <div class="mb-4">
                        <label for="project_url_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Project URL (Live Demo)</label>
                        <input type="url"
                               name="project_url"
                               id="project_url_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('project_url', $projectUrl) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="https://example.com">
                    </div>

                    <!-- GitHub URL -->
                    <div class="mb-4">
                        <label for="project_github_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}" class="block mb-2 text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url"
                               name="github_url"
                               id="project_github_{{ $modalType }}_{{ $projectId ?? 'new' }}_{{ $userId }}"
                               value="{{ old('github_url', $githubUrl) }}"
                               class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                               placeholder="https://github.com/username/project">
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
