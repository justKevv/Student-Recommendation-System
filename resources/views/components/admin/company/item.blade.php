@props([
    'no' => '',
    'name' => '',
    'industry_field' => '',
    'city' => '',
    'email' => '',
    'company',
])

<tr class="border-b border-gray-100 transition hover:bg-gray-50">
    <td class="px-6 py-4 text-gray-700 text-md">{{ $no }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $name }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $industry_field }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $city }}</td>
    <td class="px-6 py-4 text-gray-700 text-md">{{ $email }}</td>
    <td class="px-6 py-4">
        <div class="flex justify-center">
            <div class="inline-flex relative hs-dropdown">
                <button id="hs-dropdown-custom-icon-trigger" type="button"
                    class="flex z-20 justify-center items-center text-sm font-semibold text-gray-800 bg-white rounded-lg border border-gray-200 hs-dropdown-toggle size-9 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <svg class="flex-none text-gray-600 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="12" cy="5" r="1" />
                        <circle cx="12" cy="19" r="1" />
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-lg mt-2 z-50 border border-gray-200"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="p-1 space-y-0.5">
                        <a class="flex gap-x-3.5 items-center px-3 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                            href="{{ route('detail.company', Str::slug($company->name)) }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Detail
                        </a>
                        <button type="button"
                            class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                            data-hs-overlay="#hs-edit-company-modal-{{ $company->id }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit
                        </button>
                        <button type="button"
                            class="flex gap-x-3.5 items-center px-3 py-2 w-full text-sm text-left text-red-600 rounded-lg hover:bg-red-50 focus:outline-hidden focus:bg-red-50"
                            data-hs-overlay="#hs-delete-company-modal-{{ $company->id }}">
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
    </td>
</tr>



<!-- Edit Company Modal -->
<div id="hs-edit-company-modal-{{ $company->id }}"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-edit-company-modal-label-{{ $company->id }}">
    <div
        class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
        <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 shadow-sm pointer-events-auto">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                <h3 id="hs-edit-company-modal-label-{{ $company->id }}" class="font-bold text-gray-800">
                    Edit Company
                </h3>
                <button type="button"
                    class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-edit-company-modal-{{ $company->id }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" id="editCompanyForm-{{ $company->id }}" enctype="multipart/form-data">
                <div class="overflow-y-auto p-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="edit-name-{{ $company->id }}" class="block mb-2 text-sm font-medium">Name
                                <span class="text-red-600">*</span></label>
                            <input type="text" id="edit-name-{{ $company->id }}" name="name"
                                value="{{ $name }}"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="edit-industry_field-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Industry Field <span
                                    class="text-red-600">*</span></label>
                            <select id="edit-industry_field-{{ $company->id }}" name="industry_field"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                                <option value="">Select Industry Field</option>
                                <option value="technology" {{ $company->industry_field == 'technology' ? 'selected' : '' }}>Technology</option>
                                <option value="healthcare" {{ $company->industry_field == 'healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="finance" {{ $company->industry_field == 'finance' ? 'selected' : '' }}>Finance</option>
                                <option value="education" {{ $company->industry_field == 'education' ? 'selected' : '' }}>Education</option>
                                <option value="manufacturing" {{ $company->industry_field == 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="retail" {{ $company->industry_field == 'retail' ? 'selected' : '' }}>Retail</option>
                                <option value="construction" {{ $company->industry_field == 'construction' ? 'selected' : '' }}>Construction</option>
                                <option value="transportation" {{ $company->industry_field == 'transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="energy" {{ $company->industry_field == 'energy' ? 'selected' : '' }}>Energy</option>
                                <option value="agriculture" {{ $company->industry_field == 'agriculture' ? 'selected' : '' }}>Agriculture</option>
                                <option value="media_entertainment" {{ $company->industry_field == 'media_entertainment' ? 'selected' : '' }}>Media & Entertainment</option>
                                <option value="hospitality" {{ $company->industry_field == 'hospitality' ? 'selected' : '' }}>Hospitality</option>
                                <option value="real_estate" {{ $company->industry_field == 'real_estate' ? 'selected' : '' }}>Real Estate</option>
                                <option value="consulting" {{ $company->industry_field == 'consulting' ? 'selected' : '' }}>Consulting</option>
                                <option value="non_profit" {{ $company->industry_field == 'non_profit' ? 'selected' : '' }}>Non-Profit</option>
                                <option value="government" {{ $company->industry_field == 'government' ? 'selected' : '' }}>Government</option>
                                <option value="other" {{ $company->industry_field == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="edit-profile_picture-{{ $company->id }}" class="block mb-2 text-sm font-medium">Profile Picture</label>
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <img id="edit-profile-preview-{{ $company->id }}"
                                         src="{{ $company->profile_picture }}{{ strpos($company->profile_picture, '?') !== false ? '&' : '?' }}t={{ time() }}"
                                         alt="Company Profile"
                                         class="object-cover w-20 h-20 rounded-lg border border-gray-300">
                                </div>
                                <div class="flex-1">
                                    <input type="file"
                                           id="edit-profile_picture-{{ $company->id }}"
                                           name="profile_picture"
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                           onchange="previewEditImage(event, {{ $company->id }})">
                                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    @if($company->profile_picture)
                                        <div class="mt-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="remove_profile_picture" value="1" class="text-blue-600 rounded border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                <span class="ml-2 text-sm text-gray-600">Remove current image</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="edit-address-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Address <span
                                    class="text-red-600">*</span></label>
                            <textarea id="edit-address-{{ $company->id }}" name="address" rows="3"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>{{ $company->address }}</textarea>
                        </div>
                        <div>
                            <label for="edit-city-{{ $company->id }}" class="block mb-2 text-sm font-medium">City
                                <span class="text-red-600">*</span></label>
                            <input type="text" id="edit-city-{{ $company->id }}" name="city"
                                value="{{ $city }}"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="edit-province-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Province <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="edit-province-{{ $company->id }}" name="province"
                                value="{{ $company->province }}"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="edit-postal_code-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Postal Code <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="edit-postal_code-{{ $company->id }}" name="postal_code"
                                value="{{ $company->postal_code }}"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="edit-website-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Website URL</label>
                            <div class="relative">
                                <input type="text" id="edit-website-{{ $company->id }}" name="website"
                                    value="{{ $company->website }}"
                                    class="block px-4 py-2.5 w-full rounded-lg border-gray-300 sm:py-3 ps-16 sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="www.example.com">
                                <div
                                    class="flex absolute inset-y-0 z-20 items-center pointer-events-none start-0 ps-4">
                                    <span class="text-sm text-gray-500">http://</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="edit-email-{{ $company->id }}" class="block mb-2 text-sm font-medium">Email
                                <span class="text-red-600">*</span></label>
                            <input type="email" id="edit-email-{{ $company->id }}" name="email"
                                value="{{ $email }}"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="edit-description-{{ $company->id }}" class="block mb-2 text-sm font-medium">Description</label>
                            <textarea id="edit-description-{{ $company->id }}" name="description" rows="4"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter company description...">{{ $company->description }}</textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="edit-nice_to_have-{{ $company->id }}"
                                class="block mb-2 text-sm font-medium">Nice to Have</label>
                            <textarea id="edit-nice_to_have-{{ $company->id }}" name="nice_to_have" rows="4"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Additional information about the company...">{{ is_array($company->nice_to_have) ? implode("\n", $company->nice_to_have) : $company->nice_to_have }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-edit-company-modal-{{ $company->id }}">
                        Close
                    </button>
                    <button type="submit" form="editCompanyForm-{{ $company->id }}"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg border border-transparent hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Update Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewEditImage(event, companyId) {
    const file = event.target.files[0];
    const preview = document.getElementById(`edit-profile-preview-${companyId}`);

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>

<!-- Delete Company Modal -->
<form action="{{ route('admin.companies.destroy', $company->id) }}" method="post">
    @csrf
    @method('delete')
    <div id="hs-delete-company-modal-{{ $company->id }}"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
        role="dialog" tabindex="-1" aria-labelledby="hs-delete-company-modal-{{ $company->id }}-label">
        <div
            class="m-3 opacity-0 transition-all ease-out hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full">
            <div class="flex flex-col bg-white rounded-xl border shadow-sm pointer-events-auto">
                <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-delete-company-modal-{{ $company->id }}-label" class="font-bold text-gray-800">
                        Confirm Delete
                    </h3>
                    <button type="button"
                        class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-delete-company-modal-{{ $company->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 6-12 12"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4 text-center">
                    <p class="text-gray-800">
                        Are you sure you want to delete <strong>{{ $name }}</strong>? This action cannot be
                        undone.
                    </p>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-company-modal-{{ $company->id }}">
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
