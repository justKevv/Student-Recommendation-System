@extends('student.layout.app')

@section('content')
    <div class="max-w-6xl p-6 mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Work Experience</h1>
                <p class="mt-2 text-gray-600">Showcase your professional journey and achievements</p>
            </div>
            <div class="flex gap-x-3">
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-experience-modal"
                    data-hs-overlay="#hs-add-experience-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Experience
                </button>
                <a href="{{ route('student.project') }}"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg gap-x-2 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    View Project
                </a>
            </div>
        </div>

        @if ($experiences && $experiences->count() > 0)
            <!-- Experiences List -->
            <div id="experiencesList" class="space-y-6">
                @foreach ($experiences as $experience)
                    <div class="p-6 transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $experience->title }}</h3>
                                <p class="font-medium text-redgoon">{{ $experience->company }}</p>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $experience->start_date->format('M Y') }} -
                                    @if ($experience->is_currently_working_here)
                                        Present
                                    @else
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    @endif
                                    @php
                                        $startDate = $experience->start_date;
                                        $endDate = $experience->is_currently_working_here
                                            ? now()
                                            : $experience->end_date ?? now();
                                        $diffInMonths = $startDate->diffInMonths($endDate);
                                        $years = intval($diffInMonths / 12);
                                        $months = $diffInMonths % 12;

                                        if ($years > 0) {
                                            $duration =
                                                $years .
                                                ' yr' .
                                                ($years > 1 ? 's' : '') .
                                                ($months > 0 ? ' ' . $months . ' mo' : '');
                                        } elseif ($months > 0) {
                                            $duration = $months . ' mo' . ($months > 1 ? 's' : '');
                                        } else {
                                            $duration = '< 1 mo';
                                        }
                                    @endphp
                                    • {{ $duration }}
                                </p>
                                <div class="flex gap-2 mt-2">
                                    <span
                                        class="px-3 py-1 bg-gray-200 rounded-full text-neutral-700 text-[12px] font-medium font-['Poppins'] whitespace-nowrap">
                                        {{ ucfirst(str_replace('-', ' ', $experience->employment_type)) }}
                                    </span>
                                    <span
                                        class="px-3 py-1 bg-gray-200 rounded-full text-neutral-700 text-[12px] font-medium font-['Poppins'] whitespace-nowrap">
                                        {{ ucfirst(str_replace('_', ' ', $experience->type)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="inline-flex relative hs-dropdown [--placement:bottom-right] ml-4">
                                <button id="hs-dropdown-experience-{{ $experience->id }}" type="button"
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
                                    aria-labelledby="hs-dropdown-experience-{{ $experience->id }}">
                                    <div class="p-1 space-y-0.5">
                                        <button type="button"
                                            class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-red-600 rounded-lg select-none hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                                            aria-haspopup="dialog" aria-expanded="false"
                                            aria-controls="hs-delete-experience-modal-{{ $experience->id }}"
                                            data-hs-overlay="#hs-delete-experience-modal-{{ $experience->id }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($experience->description)
                            <ul class="space-y-1 text-sm leading-relaxed text-gray-700 list-disc list-inside">
                                @if (is_array($experience->description))
                                    @foreach ($experience->description as $item)
                                        @foreach (preg_split('/\r\n|\r|\n/', $item) as $line)
                                            @if (trim($line))
                                                <li>{{ trim($line) }}</li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach (preg_split('/\r\n|\r|\n/', $experience->description) as $item)
                                        @if (trim($item))
                                            <li>{{ trim($item) }}</li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Delete Experience Modals -->
            @foreach ($experiences as $experience)
                <form action="{{ route('student.experience.onboarding.destroy', $experience->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div id="hs-delete-experience-modal-{{ $experience->id }}"
                        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
                        role="dialog" tabindex="-1"
                        aria-labelledby="hs-delete-experience-modal-{{ $experience->id }}-label">
                        <div
                            class="m-3 transition-all ease-out opacity-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
                            <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
                                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                                    <h3 id="hs-delete-experience-modal-{{ $experience->id }}-label"
                                        class="font-bold text-gray-800">
                                        Confirm Delete
                                    </h3>
                                    <button type="button"
                                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-label="Close"
                                        data-hs-overlay="#hs-delete-experience-modal-{{ $experience->id }}">
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
                                        Are you sure you want to delete <strong>{{ $experience->title }}</strong> at
                                        <strong>{{ $experience->company }}</strong>? This action cannot be undone.
                                    </p>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-delete-experience-modal-{{ $experience->id }}">
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
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6">
                        </path>
                    </svg>
                </div>
                <h3 class="mb-2 text-lg font-medium text-gray-900">No work experience added yet</h3>
                <p class="mb-6 text-gray-500">Start building your professional profile by adding your work experience</p>
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700"
                    aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-experience-modal"
                    data-hs-overlay="#hs-add-experience-modal">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add your first experience
                </button>
            </div>
        @endif


    </div>

    <div id="hs-add-experience-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-experience-modal-label">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
            <div class="flex flex-col w-full bg-white border border-gray-200 shadow-sm pointer-events-auto rounded-xl">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-add-experience-modal-label" class="font-bold text-gray-800">
                        Add Experience
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-add-experience-modal">
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
                    <form action="{{ route('student.experience.onboarding.store') }}" method="POST"
                        id="experienceForm">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="title" class="block mb-2 text-sm font-medium">Job Title <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="title" name="title"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="employment_type" class="block mb-2 text-sm font-medium">Employment Type <span
                                        class="text-red-500">*</span></label>
                                <select id="employment_type" name="employment_type"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Select Employment Type</option>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="contract">Contract</option>
                                    <option value="freelance">Freelance</option>
                                </select>
                            </div>
                            <div>
                                <label for="company" class="block mb-2 text-sm font-medium">Company <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="company" name="company"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium">Work Type <span
                                        class="text-red-500">*</span></label>
                                <select id="type" name="type"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Select Work Type</option>
                                    <option value="remote">Remote</option>
                                    <option value="on_site">On Site</option>
                                    <option value="hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div>
                                <label for="start_date" class="block mb-2 text-sm font-medium">Start Date <span
                                        class="text-red-500">*</span></label>
                                <input type="date" id="start_date" name="start_date"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <div>
                                <label for="end_date" class="block mb-2 text-sm font-medium">End Date</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_currently_working_here"
                                        name="is_currently_working_here" value="1" class="mr-2">
                                    <label for="is_currently_working_here" class="text-sm text-gray-700">I am currently
                                        working in this role</label>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="block w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Describe your role and responsibilities..."></textarea>
                                <p class="mt-1 text-xs text-gray-500">Enter each responsibilities on a new line</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-add-experience-modal">
                                Cancel
                            </button>
                            <button type="submit" form="experienceForm"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save Experience
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentlyWorkingCheckbox = document.getElementById('is_currently_working_here');
            const endDateInput = document.getElementById('end_date');
            const experienceForm = document.getElementById('experienceForm');
            const experiencesList = document.getElementById('experiencesList');
            const emptyState = document.getElementById('emptyState');
            let experiences = [];

            // Load existing experiences on page load
            loadExperiences();

            // Handle currently working checkbox
            currentlyWorkingCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    endDateInput.value = '';
                    endDateInput.disabled = true;
                    endDateInput.required = false;
                } else {
                    endDateInput.disabled = false;
                }
            });

            // Handle form submission
            experienceForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Saving...';
                submitButton.disabled = true;

                const formData = new FormData(this);

                // Convert description to JSON array format
                const description = formData.get('description');
                if (description) {
                    formData.set('description', JSON.stringify([description]));
                }

                fetch('/student/experiences', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Close modal
                            const modal = document.getElementById('hs-add-experience-modal');
                            HSOverlay.close(modal);

                            // Add experience to the list
                            addExperienceCard(data.experience);

                            // Reset form
                            resetForm();

                            // Show success notification
                            showNotification('Experience added successfully!', 'success');
                        } else {
                            showNotification('Error: ' + (data.message || 'Failed to save experience'),
                                'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showNotification('An error occurred while saving the experience.', 'error');
                    })
                    .finally(() => {
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                    });
            });

            function loadExperiences() {
                // This would typically fetch from the server
                // For now, we'll start with an empty list
                updateUI();
            }

            function addExperienceCard(experience) {
                experiences.push(experience);

                const card = createExperienceCard(experience);
                experiencesList.appendChild(card);

                updateUI();
            }

            function createExperienceCard(experience) {
                const card = document.createElement('div');
                card.className =
                    'bg-white rounded-lg border border-gray-200 p-6 shadow-sm hover:shadow-md transition-shadow';

                const endDate = experience.end_date ? formatDate(experience.end_date) : 'Present';
                const duration = calculateDuration(experience.start_date, experience.end_date);

                card.innerHTML = `
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">${experience.title}</h3>
                        <p class="font-medium text-blue-600">${experience.company}</p>
                        <p class="mt-1 text-sm text-gray-600">
                            ${formatDate(experience.start_date)} - ${endDate} • ${duration}
                        </p>
                        <div class="flex gap-2 mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">
                                ${experience.employment_type}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                ${experience.type}
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-2 ml-4">
                        <button onclick="editExperience(${experience.id})" class="text-gray-400 transition-colors hover:text-blue-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button onclick="deleteExperience(${experience.id})" class="text-gray-400 transition-colors hover:text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                ${experience.description ? `<p class="text-sm leading-relaxed text-gray-700">${experience.description}</p>` : ''}
            `;

                return card;
            }

            function resetForm() {
                experienceForm.reset();
                endDateInput.disabled = false;
                currentlyWorkingCheckbox.checked = false;
            }

            function updateUI() {
                if (experiences.length === 0) {
                    emptyState.style.display = 'block';
                    experiencesList.style.display = 'none';
                } else {
                    emptyState.style.display = 'none';
                    experiencesList.style.display = 'block';
                }
            }

            function formatDate(dateString) {
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'short'
                });
            }

            function calculateDuration(startDate, endDate) {
                const start = new Date(startDate);
                const end = endDate ? new Date(endDate) : new Date();

                const diffTime = Math.abs(end - start);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                const diffMonths = Math.floor(diffDays / 30);
                const diffYears = Math.floor(diffMonths / 12);

                if (diffYears > 0) {
                    const remainingMonths = diffMonths % 12;
                    return `${diffYears} yr${diffYears > 1 ? 's' : ''}${remainingMonths > 0 ? ` ${remainingMonths} mo` : ''}`;
                } else if (diffMonths > 0) {
                    return `${diffMonths} mo${diffMonths > 1 ? 's' : ''}`;
                } else {
                    return '< 1 mo';
                }
            }

            function showNotification(message, type = 'info') {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
                notification.textContent = message;

                document.body.appendChild(notification);

                // Animate in
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                }, 100);

                // Remove after 3 seconds
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 3000);
            }

            // Global functions for card actions
            window.editExperience = function(id) {
                // Implementation for editing experience
                console.log('Edit experience:', id);
            };

            window.deleteExperience = function(id) {
                if (confirm('Are you sure you want to delete this experience?')) {
                    // Implementation for deleting experience
                    console.log('Delete experience:', id);
                }
            };
        });
    </script>
@endsection
