@extends('student.layout.app')

@section('content')
    <div class="max-w-6xl p-6 mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
                <p class="mt-2 text-gray-600">Showcase your technical projects and achievements</p>
            </div>
            <div class="flex items-center gap-4">
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-project-modal"
                    data-hs-overlay="#hs-add-project-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Project
                </button>
            <a href="{{ route('student.certificate') }}"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg gap-x-2 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                    </svg>
                    View Certification
                </a>
            </div>
        </div>

        @if ($projects && $projects->count() > 0)
            <!-- Projects List -->
            <div id="projectsList" class="space-y-6">
                @foreach ($projects as $project)
                    <div class="p-6 transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $project->title }}</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $project->description }}</p>
                                <div class="flex gap-2 mt-3">
                                    @if($project->github_link)
                                        <a href="{{ $project->github_link }}" target="_blank"
                                           class="inline-flex items-center px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            GitHub
                                        </a>
                                    @endif
                                    @if($project->live_link)
                                        <a href="{{ $project->live_link }}" target="_blank"
                                           class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full hover:bg-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            Live Demo
                                        </a>    
                                    @endif
                                </div>
                                @if($project->project_skills)
                                    <div class="flex flex-wrap gap-2.5 mt-3">
                                        @foreach(json_decode($project->project_skills, true) as $skill)
                                            <span class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-[10px] font-medium font-['Poppins'] rounded-[15px]">
                                                {{ $skill }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2 ml-4">
                                @if($project->project_image)
                                    <img src="{{ $project->project_image }}" alt="{{ $project->title }}"
                                         class="object-cover w-24 h-24 rounded-lg">
                                @endif
                                <div class="inline-flex relative hs-dropdown [--placement:bottom-right]">
                                    <button id="hs-dropdown-custom-icon-trigger-{{ $project->id }}" type="button"
                                        class="z-20 flex items-center justify-center text-sm font-semibold text-gray-800 bg-white border border-gray-200 rounded-lg hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
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
                                        aria-labelledby="hs-dropdown-custom-icon-trigger-{{ $project->id }}">
                                        <div class="p-1 space-y-0.5">
                                            <button type="button"
                                                class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-red-600 rounded-lg select-none hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-delete-project-modal-{{ $project->id }}"
                                                data-hs-overlay="#hs-delete-project-modal-{{ $project->id }}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
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

            {{-- Delete Project Modals --}}
            @foreach ($projects as $project)
                <form action="{{ route('student.project.destroy', $project->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div id="hs-delete-project-modal-{{ $project->id }}"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
                        role="dialog" tabindex="-1" aria-labelledby="hs-delete-project-modal-{{ $project->id }}-label">
                        <div
                            class="m-3 transition-all ease-out opacity-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
                            <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
                                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                                    <h3 id="hs-delete-project-modal-{{ $project->id }}-label" class="font-bold text-gray-800">
                                        Confirm Delete
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-label="Close" data-hs-overlay="#hs-delete-project-modal-{{ $project->id }}">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m18 6-12 12"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4 overflow-y-auto text-center">
                                    <p class="text-gray-800">
                                        Are you sure you want to delete <strong>{{ $project->title }}</strong>? This action cannot be undone.
                                    </p>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-delete-project-modal-{{ $project->id }}">
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
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h3 class="mb-2 text-lg font-medium text-gray-900">No projects added yet</h3>
                <p class="mb-6 text-gray-500">Start showcasing your technical skills by adding your projects</p>
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-project-modal"
                    data-hs-overlay="#hs-add-project-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add your first project
                </button>
            </div>
        @endif
    </div>

    <div id="hs-add-project-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-project-modal-label">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
            <div class="flex flex-col w-full bg-white border border-gray-200 shadow-sm pointer-events-auto rounded-xl">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-add-project-modal-label" class="font-bold text-gray-800">
                        Add Project
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-add-project-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="{{ route('student.project.onboarding.store') }}" method="POST" id="projectForm" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium">Project Title <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="title" name="title"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium">Description <span
                                        class="text-red-500">*</span></label>
                                <textarea id="description" name="description" rows="3"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required></textarea>
                            </div>
                            <div>
                                <label for="github_link" class="block mb-2 text-sm font-medium">GitHub Link</label>
                                <input type="url" id="github_link" name="github_link"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="https://github.com/username/repository">
                            </div>
                            <div>
                                <label for="live_link" class="block mb-2 text-sm font-medium">Live Demo Link</label>
                                <input type="url" id="live_link" name="live_link"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="https://your-project.com">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="project_skills" class="block mb-2 text-sm font-medium">Technologies Used <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="project_skills" name="project_skills"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="React, Node.js, MongoDB, etc. (separate with commas)"
                                    required>
                                <p class="mt-1 text-xs text-gray-500">Separate technologies with commas</p>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="project_image" class="block mb-2 text-sm font-medium">Project Image</label>
                                <input type="file" id="project_image" name="project_image" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="mt-1 text-xs text-gray-500">Upload a screenshot or image of your project</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6 gap-x-2">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-add-project-modal">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                                Add Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
