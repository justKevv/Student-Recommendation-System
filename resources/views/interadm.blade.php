@extends('layout.app')

@section('title')
    Job Activity
@endsection


@section('content')
    <x-admin.toggle-table />

    <x-filter-bar>
        <x-filter-item title="Location" />
        <x-filter-item title="Work Type" />
        <x-filter-item title="Category" />
        <div class="pl-150">
            <x-admin.add-data data="internship" :companies="$companies" />
        </div>
    </x-filter-bar>

    <div id="job-content" class="w-full">
        <x-dashboard.layout gap="30px" class="pt-6">
            <div class="space-x-6 space-y-6">
                @foreach ($internships as $internship)
                    <x-internship.card :is_admin='true' href="{{ route('detail.job', $internship->slug) }}"
                        :company="$internship->company->name" :due="$internship->remaining_time" :location="$internship->location" :title="$internship->title" :type="$internship->type"
                        :internship_id="$internship->id" />
                @endforeach
            </div>
        </x-dashboard.layout>
    </div>

    <div id="activity-content" class="hidden w-full">
        <x-dashboard.layout gap="30px" class="pt-6">
            <div class="space-x-6 space-y-6">
                @foreach ($internships as $internship)
                    @if ($internship->remaining_time == 'Closed')
                        <x-internship.card :is_admin='true' href="{{ route('detail.job') }}" :company="$internship->company->name"
                            :due="$internship->remaining_time" :location="$internship->location" :title="$internship->title" :type="$internship->type"
                            :internship_id="$internship->id" />
                    @endif
                @endforeach
            </div>
        </x-dashboard.layout>
    </div>

    <!-- Delete Internship Modals -->
    @foreach ($internships as $internship)
        <form action="{{ route('internships.destroy', $internship->id) }}" method="post">
            @csrf
            @method('delete')
            <div id="hs-delete-internship-modal-{{ $internship->id }}"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
                role="dialog" tabindex="-1" aria-labelledby="hs-delete-internship-modal-{{ $internship->id }}-label">
                <div
                    class="m-3 opacity-0 transition-all ease-out hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
                    <div class="flex flex-col bg-white rounded-xl border shadow-sm pointer-events-auto">
                        <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                            <h3 id="hs-delete-internship-modal-{{ $internship->id }}-label" class="font-bold text-gray-800">
                                Confirm Delete
                            </h3>
                            <button type="button"
                                class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                aria-label="Close" data-hs-overlay="#hs-delete-internship-modal-{{ $internship->id }}">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 6-12 12"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="overflow-y-auto p-4 text-center">
                            <p class="text-gray-800">
                                Are you sure you want to delete <strong>{{ $internship->title }}</strong> at
                                <strong>{{ $internship->company->name }}</strong>? This action cannot be undone.
                            </p>
                        </div>
                        <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                            <button type="button"
                                class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#hs-delete-internship-modal-{{ $internship->id }}">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg border border-transparent hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Edit Internship Modal -->
        <div id="hs-edit-internship-modal-{{ $internship->id }}"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="hs-edit-internship-modal-label-{{ $internship->id }}">
            <div
                class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
                <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 shadow-sm pointer-events-auto">
                    <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                        <h3 id="hs-edit-internship-modal-label-{{ $internship->id }}" class="font-bold text-gray-800">
                            Edit Internship
                        </h3>
                        <button type="button"
                            class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                            aria-label="Close" data-hs-overlay="#hs-edit-internship-modal-{{ $internship->id }}">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="overflow-y-auto p-4">
                        <form action="{{ route('internships.update', $internship->id) }}" method="POST"
                            id="editInternshipForm-{{ $internship->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="edit-company_id-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Company <span
                                            class="text-redgoon">*</span></label>
                                    <select id="edit-company_id-{{ $internship->id }}" name="company_id"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                        <option value="">Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                {{ $internship->company_id == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="edit-title-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Title <span
                                            class="text-redgoon">*</span></label>
                                    <input type="text" id="edit-title-{{ $internship->id }}" name="title"
                                        value="{{ $internship->title }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="edit-description-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Description <span
                                            class="text-redgoon">*</span></label>
                                    <textarea id="edit-description-{{ $internship->id }}" name="description" rows="4"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>{{ $internship->description }}</textarea>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="edit-requirements-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Requirements <span
                                            class="text-redgoon">*</span></label>
                                    <textarea id="edit-requirements-{{ $internship->id }}" name="requirements" rows="3"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Enter each requirement on a new line" required>{{ implode("\n", $internship->requirements ?? []) }}</textarea>
                                    <p class="mt-1 text-xs text-gray-500">Enter each requirement on a new line</p>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="edit-eligibility_criteria-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Eligibility Criteria <span
                                            class="text-redgoon">*</span></label>
                                    <textarea id="edit-eligibility_criteria-{{ $internship->id }}" name="eligibility_criteria" rows="3"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Enter each criteria on a new line" required>{{ implode("\n", $internship->eligibility_criteria ?? []) }}</textarea>
                                    <p class="mt-1 text-xs text-gray-500">Enter each criteria on a new line</p>
                                </div>

                                <!-- Key Responsibilities Section -->
                                <div class="sm:col-span-2">
                                    <div class="flex justify-between items-center mb-3">
                                        <label class="block text-sm font-medium">Key Responsibilities <span
                                                class="text-redgoon">*</span></label>
                                        <button type="button" class="text-sm text-blue-600 hover:text-blue-800"
                                            onclick="addEditResponsibilitySection({{ $internship->id }})">+ Add
                                            Section</button>
                                    </div>
                                    <div id="edit-responsibilities-container-{{ $internship->id }}" class="space-y-4">
                                        @php
                                            $responsibilities = $internship->responsibilities ?? [];
                                        @endphp
                                        @foreach ($responsibilities as $index => $responsibility)
                                            <div class="responsibility-section border border-gray-200 rounded-lg p-4">
                                                <div class="flex justify-between items-center mb-3">
                                                    <label class="block text-sm font-medium">Section Title</label>
                                                    @if ($index > 0)
                                                        <button type="button"
                                                            class="text-sm text-red-600 hover:text-red-800"
                                                            onclick="removeEditResponsibilitySection(this)">Remove
                                                            Section</button>
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" name="responsibility_titles[]"
                                                        value="{{ $responsibility['title'] ?? '' }}"
                                                        class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="e.g., Frontend Development" required>
                                                </div>
                                                <div class="responsibility-items">
                                                    <label class="block mb-1 text-sm font-medium">Items</label>
                                                    <div class="space-y-2">
                                                        @foreach ($responsibility['items'] ?? [] as $itemIndex => $item)
                                                            <div class="{{ $itemIndex > 0 ? 'flex gap-2' : '' }}">
                                                                <input type="text"
                                                                    name="responsibility_items[{{ $index }}][]"
                                                                    value="{{ $item }}"
                                                                    class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                                    placeholder="Enter responsibility item" required>
                                                                @if ($itemIndex > 0)
                                                                    <button type="button"
                                                                        class="px-2 text-sm text-red-600 hover:text-red-800"
                                                                        onclick="removeEditResponsibilityItem(this)">Remove</button>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button type="button"
                                                        class="mt-2 text-sm text-blue-600 add-item-btn hover:text-blue-800"
                                                        onclick="addEditResponsibilityItem(this, {{ $internship->id }})">+
                                                        Add Item</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (empty($responsibilities))
                                            <!-- Default section if no responsibilities exist -->
                                            <div class="responsibility-section border border-gray-200 rounded-lg p-4">
                                                <div class="mb-3">
                                                    <label class="block mb-1 text-sm font-medium">Section Title</label>
                                                    <input type="text" name="responsibility_titles[]"
                                                        class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="e.g., Frontend Development" required>
                                                </div>
                                                <div class="responsibility-items">
                                                    <label class="block mb-1 text-sm font-medium">Items</label>
                                                    <div class="space-y-2">
                                                        <input type="text" name="responsibility_items[0][]"
                                                            class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                            placeholder="Enter responsibility item" required>
                                                    </div>
                                                    <button type="button"
                                                        class="mt-2 text-sm text-blue-600 add-item-btn hover:text-blue-800"
                                                        onclick="addEditResponsibilityItem(this, {{ $internship->id }})">+
                                                        Add Item</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <label for="edit-type-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Type <span
                                            class="text-redgoon">*</span></label>
                                    <select id="edit-type-{{ $internship->id }}" name="type"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                        <option value="">Select Type</option>
                                        <option value="remote" {{ $internship->type == 'remote' ? 'selected' : '' }}>
                                            Remote</option>
                                        <option value="hybrid" {{ $internship->type == 'hybrid' ? 'selected' : '' }}>
                                            Hybrid</option>
                                        <option value="on_site" {{ $internship->type == 'on_site' ? 'selected' : '' }}>On
                                            Site</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="edit-location-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Location <span
                                            class="text-redgoon">*</span></label>
                                    <input type="text" id="edit-location-{{ $internship->id }}" name="location"
                                        value="{{ $internship->location }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label for="edit-open_until-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Open Until <span
                                            class="text-redgoon">*</span></label>
                                    <input type="date" id="edit-open_until-{{ $internship->id }}" name="open_until"
                                        value="{{ $internship->open_until ? $internship->open_until->format('Y-m-d') : ''}}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label for="edit-start_date-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Start Date <span
                                            class="text-redgoon">*</span></label>
                                    <input type="date" id="edit-start_date-{{ $internship->id }}" name="start_date"
                                        value="{{ $internship->start_date ? $internship->start_date->format('Y-m-d') : '' }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label for="edit-end_date-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">End Date <span
                                            class="text-redgoon">*</span></label>
                                    <input type="date" id="edit-end_date-{{ $internship->id }}" name="end_date"
                                        value="{{ $internship->end_date ? $internship->end_date->format('Y-m-d') : '' }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label for="edit-internship_picture-{{ $internship->id }}"
                                        class="block mb-2 text-sm font-medium">Internship Picture</label>
                                    <input type="file" id="edit-internship_picture-{{ $internship->id }}"
                                        name="internship_picture"
                                        class="block w-full text-sm rounded-lg border border-gray-300 shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                                        accept="image/*">
                                    @if ($internship->internship_picture)
                                        <p class="mt-1 text-xs text-gray-500">Current: <a
                                                href="{{ $internship->internship_picture }}" target="_blank"
                                                class="text-blue-600 hover:underline">View current image</a></p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex gap-x-2 justify-end items-center mt-6">
                                <button type="button"
                                    class="inline-flex gap-x-2 items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#hs-edit-internship-modal-{{ $internship->id }}">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="inline-flex gap-x-2 items-center px-4 py-2 text-sm font-medium rounded-lg border border-transparent text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Update Internship
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Initialize section index for this specific internship
            if (typeof window.editResponsibilitySectionIndexes === 'undefined') {
                window.editResponsibilitySectionIndexes = {};
            }
            window.editResponsibilitySectionIndexes[{{ $internship->id }}] = {{ count($responsibilities) }};

            function addEditResponsibilitySection(internshipId) {
                window.editResponsibilitySectionIndexes[internshipId]++;
                const container = document.getElementById(`edit-responsibilities-container-${internshipId}`);
                const newSection = document.createElement('div');
                newSection.className = 'responsibility-section border border-gray-200 rounded-lg p-4';
                newSection.innerHTML = `
                    <div class="flex justify-between items-center mb-3">
                        <label class="block text-sm font-medium">Section Title</label>
                        <button type="button" class="text-sm text-red-600 hover:text-red-800"
                            onclick="removeEditResponsibilitySection(this)">Remove Section</button>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="responsibility_titles[]"
                            class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="e.g., Frontend Development" required>
                    </div>
                    <div class="responsibility-items">
                        <label class="block mb-1 text-sm font-medium">Items</label>
                        <div class="space-y-2">
                            <input type="text" name="responsibility_items[${window.editResponsibilitySectionIndexes[internshipId]}][]"
                                class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter responsibility item" required>
                        </div>
                        <button type="button" class="mt-2 text-sm text-blue-600 add-item-btn hover:text-blue-800"
                            onclick="addEditResponsibilityItem(this, ${internshipId})">+ Add Item</button>
                    </div>
                `;
                container.appendChild(newSection);
            }

            function removeEditResponsibilitySection(button) {
                const section = button.closest('.responsibility-section');
                section.remove();
            }

            function addEditResponsibilityItem(button, internshipId) {
                const itemsContainer = button.previousElementSibling;
                const sectionIndex = Array.from(document.querySelectorAll(
                    `#edit-responsibilities-container-${internshipId} .responsibility-section`)).indexOf(button.closest(
                    '.responsibility-section'));
                const newItem = document.createElement('div');
                newItem.className = 'flex gap-2';
                newItem.innerHTML = `
                    <input type="text" name="responsibility_items[${sectionIndex}][]"
                        class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter responsibility item" required>
                    <button type="button" class="px-2 text-sm text-red-600 hover:text-red-800"
                        onclick="removeEditResponsibilityItem(this)">Remove</button>
                `;
                itemsContainer.appendChild(newItem);
            }

            function removeEditResponsibilityItem(button) {
                const item = button.parentElement;
                item.remove();
            }
        </script>
    @endforeach
@endsection
