@props([
    'userId' => null,
    'experienceId' => null,
    'experience' => null,
    'isEdit' => false
])

@php
    // For individual experience editing, use experience ID in modal ID
    if ($isEdit && $experienceId) {
        $modalId = "hs-vertically-centered-modal-edit-experience-{$experienceId}-area-{$userId}";
        $formId = "experience-edit-form-{$experienceId}-{$userId}";
    } else {
        $modalId = $isEdit ? "hs-vertically-centered-modal-edit-experience-area-{$userId}" : "hs-vertically-centered-modal-add-experience-area-{$userId}";
        $formId = $isEdit ? "experience-edit-form-{$userId}" : "experience-add-form-{$userId}";
    }

    $title = $isEdit ? 'Edit Experience' : 'Add Experience';
    $buttonText = $isEdit ? 'Update Experience' : 'Add Experience';

    // For edit mode, we need the experience ID for the route
    if ($isEdit && $experienceId) {
        $actionRoute = route('student.experience.update', ['experience' => $experienceId]);
    } else {
        $actionRoute = route('student.experience.store');
    }
@endphp

<div id="{{ $modalId }}"
    class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
    role="dialog" tabindex="-1" aria-labelledby="{{ $modalId }}-label">
    <div
        class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 min-h-[calc(100%-56px)] flex items-center justify-center">
        <div
            class="flex flex-col w-full max-w-2xl bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h3 id="{{ $modalId }}-label"
                    class="font-bold text-gray-800">
                    {{ $title }}
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
            </div>            <form action="{{ $actionRoute }}" method="POST" id="{{ $formId }}">
                @csrf
                @if($isEdit && $experienceId)
                    @method('PUT')
                @endif
                <div class="p-4 overflow-y-auto max-h-96">
                    <div class="grid grid-cols-1 gap-4">                        <!-- Job Title -->
                        <div>
                            <label for="title_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Job Title *</label>
                            <input type="text" name="title" id="title_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                value="{{ $isEdit && $experience ? $experience->title : old('title') }}"
                                class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="e.g. Software Engineer" required>
                        </div>                        <!-- Company -->
                        <div>
                            <label for="company_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Company *</label>
                            <input type="text" name="company" id="company_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                value="{{ $isEdit && $experience ? $experience->company : old('company') }}"
                                class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="e.g. Tech Corp" required>
                        </div>                        <!-- Employment Type -->
                        <div>
                            <label for="employment_type_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Employment Type *</label>
                            <select name="employment_type" id="employment_type_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                                <option value="">Select employment type</option>
                                <option value="full-time" {{ ($isEdit && $experience && $experience->employment_type === 'full-time') || old('employment_type') === 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ ($isEdit && $experience && $experience->employment_type === 'part-time') || old('employment_type') === 'part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="contract" {{ ($isEdit && $experience && $experience->employment_type === 'contract') || old('employment_type') === 'contract' ? 'selected' : '' }}>Contract</option>
                                <option value="internship" {{ ($isEdit && $experience && $experience->employment_type === 'internship') || old('employment_type') === 'internship' ? 'selected' : '' }}>Internship</option>
                                <option value="freelance" {{ ($isEdit && $experience && $experience->employment_type === 'freelance') || old('employment_type') === 'freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>                        <!-- Date Range -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="start_date_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Start Date *</label>
                                <input type="date" name="start_date" id="start_date_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                    value="{{ $isEdit && $experience ? $experience->start_date->format('Y-m-d') : old('start_date') }}"
                                    class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                            </div>
                            <div>
                                <label for="end_date_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                    value="{{ $isEdit && $experience && !$experience->is_currently_working_here ? $experience->end_date->format('Y-m-d') : old('end_date') }}"
                                    class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            </div>
                        </div>                        <!-- Currently Working Here -->
                        <div class="flex items-center">
                            <input type="checkbox" name="is_currently_working_here" id="currently_working_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}"
                                value="1" {{ ($isEdit && $experience && $experience->is_currently_working_here) || old('is_currently_working_here') ? 'checked' : '' }}
                                class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="currently_working_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="ml-2 text-sm text-gray-700">I am currently working in this role</label>
                        </div>                        <!-- Description -->
                        <div>
                            <label for="description_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description_{{ $isEdit && $experienceId ? $experienceId . '_' . $userId : $userId }}" rows="4"
                                class="block w-full px-3 py-3 text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Describe your responsibilities and achievements...">{{ $isEdit && $experience ? (is_array($experience->description) ? implode("\n", $experience->description) : $experience->description) : old('description') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">Enter each responsibility on a new line</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#{{ $modalId }}">
                        Cancel
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const currentlyWorkingCheckbox = document.getElementById('currently_working_{{ $isEdit && $experienceId ? $experienceId . "_" . $userId : $userId }}');
    const endDateInput = document.getElementById('end_date_{{ $isEdit && $experienceId ? $experienceId . "_" . $userId : $userId }}');

    if (currentlyWorkingCheckbox && endDateInput) {
        currentlyWorkingCheckbox.addEventListener('change', function() {
            if (this.checked) {
                endDateInput.value = '';
                endDateInput.disabled = true;
            } else {
                endDateInput.disabled = false;
            }
        });

        // Initial state
        if (currentlyWorkingCheckbox.checked) {
            endDateInput.disabled = true;
        }
    }
});
</script>
