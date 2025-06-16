@props([
    'data' => 'intership',
    'tab1' => '',
    'tab2' => '',
    'companies' => [],
])

<button type="button" id="add-data-component"
    class="min-w-fit w-auto max-w-xs h-10 px-3 sm:px-4 md:px-6 py-2 bg-white rounded-[20px] outline outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5 transition-all duration-200 hover:shadow-md cursor-pointer"
    aria-haspopup="dialog" aria-expanded="false">
    <div class="inline-flex gap-0.5 justify-center items-center">
        <div id="add-data-text"
            class="justify-center text-gray-500 text-xs sm:text-sm font-normal font-['Poppins'] truncate">
            Add {{ Str::ucfirst($data) }}
        </div>
        <div data-svg-wrapper class="relative flex-shrink-0">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.9998 20.1598C7.48784 20.1598 3.83984 16.5118 3.83984 11.9998C3.83984 7.48784 7.48784 3.83984 11.9998 3.83984C16.5118 3.83984 20.1598 7.48784 20.1598 11.9998C20.1598 16.5118 16.5118 20.1598 11.9998 20.1598ZM11.9998 4.79984C8.01584 4.79984 4.79984 8.01584 4.79984 11.9998C4.79984 15.9838 8.01584 19.1998 11.9998 19.1998C15.9838 19.1998 19.1998 15.9838 19.1998 11.9998C19.1998 8.01584 15.9838 4.79984 11.9998 4.79984Z"
                    fill="#757575" />
                <path d="M7.67969 11.5195H16.3197V12.4795H7.67969V11.5195Z" fill="#757575" />
                <path d="M11.5195 7.67969H12.4795V16.3197H11.5195V7.67969Z" fill="#757575" />
            </svg>
        </div>
    </div>
</button>

<!-- User Modal -->
<div id="hs-add-user-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-user-modal-label">
    <div
        class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-2xl sm:w-full sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 shadow-sm pointer-events-auto">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                <h3 id="hs-add-user-modal-label" class="font-bold text-gray-800">
                    Add New User
                </h3>
                <button type="button"
                    class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-add-user-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('user.management.store') }}" method="post">
                @csrf
                <div class="overflow-y-auto p-4 space-y-3" x-data="{ selectedRole: '' }">
                    <div class="w-full">
                        <label for="hs-select-label" class="block mb-2 text-sm font-medium">Role</label>
                        <select id="role-select" name="role" x-model="selectedRole"
                            class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 pe-9 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none">
                            <option selected="" value="">Select Role</option>
                            <option value="student">Student</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div x-show="selectedRole == 'student' && selectedRole !== 'Select Role'" class="space-y-3">
                        <hr class="my-4 border-gray-200">
                        <div class="w-full">
                            <label for="major-label" class="block mb-2 text-sm font-medium">Major</label>
                            <select id="major-select" name="major"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 pe-9 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none">
                                <option selected="" value="">Select Major</option>
                                <option value="informatics_engineering">Informatics Engineering</option>
                                <option value="business_information_systems">Business Information System</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="name-input" class="block mb-2 text-sm font-medium">Name</label>
                            <input type="text" id="name-input" name="name" :disabled="selectedRole !== 'student'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Kevin Bramasta">
                        </div>
                        <div class="w-full">
                            <label for="phone-input" class="block mb-2 text-sm font-medium">Phone</label>
                            <input type="tel" id="phone-input" name="phone"
                                :disabled="selectedRole !== 'student'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08821323133">
                        </div>
                        <div class="w-full">
                            <label for="semester-input" class="block mb-2 text-sm font-medium">Semester</label>
                            <input type="text" id="semester-input" name="semester"
                                :disabled="selectedRole !== 'student'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="6 (Semester)">
                        </div>
                    </div>
                    <div x-show="selectedRole == 'supervisor' && selectedRole !== 'Select Role'" class="space-y-3">
                        <hr class="my-4 border-gray-200">
                        <div class="w-full">
                            <label for="supervisor-name-input" class="block mb-2 text-sm font-medium">Name</label>
                            <input type="text" id="supervisor-name-input" name="name"
                                :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Dr. John Doe">
                        </div>
                        <div class="w-full">
                            <label for="supervisor-phone-input" class="block mb-2 text-sm font-medium">Phone</label>
                            <input type="tel" id="supervisor-phone-input" name="phone"
                                :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08821323133">
                        </div>
                        <div class="w-full">
                            <label for="teaching-start-year-input" class="block mb-2 text-sm font-medium">Teaching
                                Start Year</label>
                            <input type="number" id="teaching-start-year-input" name="teaching_start_year"
                                :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="2024" min="1990" max="2030">
                        </div>
                    </div>
                    <div x-show="selectedRole == 'admin' && selectedRole !== 'Select Role'" class="space-y-3">
                        <hr class="my-4 border-gray-200">
                        <div class="w-full">
                            <label for="admin-name-input" class="block mb-2 text-sm font-medium">Name</label>
                            <input type="text" id="admin-name-input" name="name"
                                :disabled="selectedRole !== 'admin'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="John Smith">
                        </div>
                        <div class="w-full">
                            <label for="admin-phone-input" class="block mb-2 text-sm font-medium">Phone</label>
                            <input type="tel" id="admin-phone-input" name="phone"
                                :disabled="selectedRole !== 'admin'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08821323133">
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-add-user-modal">
                        Close
                    </button>
                    <button type="submit"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Internship Modal -->
<div id="hs-add-internship-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-internship-modal-label">
    <div
        class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
        <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 shadow-sm pointer-events-auto">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                <h3 id="hs-add-internship-modal-label" class="font-bold text-gray-800">
                    Add Internship
                </h3>
                <button type="button"
                    class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-add-internship-modal">
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
                <form action="{{ route('internships.store') }}" method="POST" id="internshipForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="company_id" class="block mb-2 text-sm font-medium">Company <span
                                    class="text-redgoon">*</span></label>
                            <select id="company_id" name="company_id"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                                <option value="">Select Company</option>
                                @foreach($companies ?? [] as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium">Title <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="title" name="title"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium">Description <span
                                    class="text-redgoon">*</span></label>
                            <textarea id="description" name="description" rows="4"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required></textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="requirements" class="block mb-2 text-sm font-medium">Requirements <span
                                    class="text-redgoon">*</span></label>
                            <textarea id="requirements" name="requirements" rows="3"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter each requirement on a new line" required></textarea>
                            <p class="mt-1 text-xs text-gray-500">Enter each requirement on a new line</p>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="eligibility_criteria" class="block mb-2 text-sm font-medium">Eligibility Criteria <span
                                    class="text-redgoon">*</span></label>
                            <textarea id="eligibility_criteria" name="eligibility_criteria" rows="3"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter each criteria on a new line" required></textarea>
                            <p class="mt-1 text-xs text-gray-500">Enter each criteria on a new line</p>
                        </div>
                        
                        <!-- Key Responsibilities Section -->
                        <div class="sm:col-span-2">
                            <div class="flex justify-between items-center mb-3">
                                <label class="block text-sm font-medium">Key Responsibilities <span class="text-redgoon">*</span></label>
                                <button type="button" class="text-sm text-blue-600 hover:text-blue-800" onclick="addResponsibilitySection()">+ Add Section</button>
                            </div>
                            <div id="responsibilities-container" class="space-y-4">
                                <!-- Initial responsibility section -->
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
                                        <button type="button" class="mt-2 text-sm text-blue-600 add-item-btn hover:text-blue-800" onclick="addResponsibilityItem(this)">+ Add Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="type" class="block mb-2 text-sm font-medium">Type <span
                                    class="text-redgoon">*</span></label>
                            <select id="type" name="type"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                                <option value="">Select Type</option>
                                <option value="remote">Remote</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="on_site">On Site</option>
                            </select>
                        </div>
                        <div>
                            <label for="location" class="block mb-2 text-sm font-medium">Location <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="location" name="location"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="open_until" class="block mb-2 text-sm font-medium">Open Until <span
                                    class="text-redgoon">*</span></label>
                            <input type="date" id="open_until" name="open_until"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium">Start Date <span
                                    class="text-redgoon">*</span></label>
                            <input type="date" id="start_date" name="start_date"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium">End Date <span
                                    class="text-redgoon">*</span></label>
                            <input type="date" id="end_date" name="end_date"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="internship_picture" class="block mb-2 text-sm font-medium">Internship Picture</label>
                            <input type="file" id="internship_picture" name="internship_picture"
                                class="block w-full text-sm rounded-lg border border-gray-300 shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="flex gap-x-2 justify-end items-center mt-6">
                        <button type="button"
                            class="inline-flex gap-x-2 items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-add-internship-modal">
                            Cancel
                        </button>
                        <button type="submit"
                            class="inline-flex gap-x-2 items-center px-4 py-2 text-sm font-medium rounded-lg border border-transparent text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                            Create Internship
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Company Modal -->
<div id="hs-add-company-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-add-company-modal-label">
    <div
        class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-4xl sm:w-full sm:mx-auto">
        <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 shadow-sm pointer-events-auto">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                <h3 id="hs-add-company-modal-label" class="font-bold text-gray-800">
                    Add Company
                </h3>
                <button type="button"
                    class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-add-company-modal">
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
                <form action="{{ route('admin.companies.store') }}" method="POST" id="companyForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium">Name <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="name" name="name"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="industry_field" class="block mb-2 text-sm font-medium">Industry Field <span
                                    class="text-redgoon">*</span></label>
                            <select id="industry_field" name="industry_field"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                                <option value="">Select Industry Field</option>
                                <option value="technology">Technology</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="finance">Finance</option>
                                <option value="education">Education</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="retail">Retail</option>
                                <option value="construction">Construction</option>
                                <option value="transportation">Transportation</option>
                                <option value="energy">Energy</option>
                                <option value="agriculture">Agriculture</option>
                                <option value="media_entertainment">Media & Entertainment</option>
                                <option value="hospitality">Hospitality</option>
                                <option value="real_estate">Real Estate</option>
                                <option value="consulting">Consulting</option>
                                <option value="non_profit">Non-Profit</option>
                                <option value="government">Government</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address" class="block mb-2 text-sm font-medium">Address <span
                                    class="text-redgoon">*</span></label>
                            <textarea id="address" name="address" rows="3"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required></textarea>
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium">City <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="city" name="city"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="province" class="block mb-2 text-sm font-medium">Province <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="province" name="province"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="postal_code" class="block mb-2 text-sm font-medium">Postal Code <span
                                    class="text-redgoon">*</span></label>
                            <input type="text" id="postal_code" name="postal_code"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label for="profile_picture" class="block mb-2 text-sm font-medium">Profile Picture</label>
                            <input type="file" id="profile_picture" name="profile_picture"
                                class="block w-full text-sm rounded-lg border border-gray-300 shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                        </div>
                        <div>
                            <label for="hs-inline-add-on" class="block mb-2 text-sm font-medium">Website URL</label>
                            <div class="relative">
                                <input type="text" id="hs-inline-add-on" name="website"
                                    class="block px-4 py-2.5 w-full rounded-lg border-gray-300 sm:py-3 ps-16 sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="www.example.com">
                                <div
                                    class="flex absolute inset-y-0 z-20 items-center pointer-events-none start-0 ps-4">
                                    <span class="text-sm text-gray-500">http://</span>
                                </div>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium">Email <span
                                    class="text-redgoon">*</span></label>
                            <input type="email" id="email" name="email"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter company description..."></textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <x-text-editor/>
                            <input type="hidden" name="nice_to_have" id="nice_to_have">
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                <button type="button"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-add-company-modal">
                    Close
                </button>
                <button type="submit" form="companyForm" onclick="captureEditorContent()"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-green-600 rounded-lg border border-transparent hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save Company
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function captureEditorContent() {
    // Get the editor content from the Tiptap editor
    const editorElement = document.querySelector('#hs-editor-tiptap [data-hs-editor-field]');
    if (editorElement && window.editor) {
        // Get plain text content instead of HTML
        const content = window.editor.getText();
        document.getElementById('nice_to_have').value = content;
    }
}
</script>


@vite(['resources/js/text-editor.js'])

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.initializeTiptapEditor) {
            window.initializeTiptapEditor();
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addDataText = document.getElementById('add-data-text');
        const addDataComponent = document.getElementById('add-data-component');
        const tab1Link = document.getElementById('{{ $tab1 }}-tab-link');
        const tab2Link = document.getElementById('{{ $tab2 }}-tab-link');

        // Function to update add-data text based on active tab
        function updateAddDataText() {
            if (tab1Link && tab1Link.classList.contains('text-yellowgoon')) {
                addDataText.textContent = 'Add {{ Str::ucfirst($tab1) }}';
            } else if (tab2Link && tab2Link.classList.contains('text-yellowgoon')) {
                addDataText.textContent = 'Add {{ Str::ucfirst($tab2) }}';
            }
        }

        // Function to get current active tab
        function getCurrentActiveTab() {
            if (tab1Link && tab1Link.classList.contains('text-yellowgoon')) {
                return '{{ $tab1 }}';
            } else if (tab2Link && tab2Link.classList.contains('text-yellowgoon')) {
                return '{{ $tab2 }}';
            }
            return '{{ $tab1 }}'; // Default to first tab
        }

        // Handle add data component click
        if (addDataComponent) {
            addDataComponent.addEventListener('click', function() {
                const activeTab = getCurrentActiveTab();
                let modalId;

                if (activeTab === 'user') {
                    modalId = '#hs-add-user-modal';
                } else if (activeTab === 'company') {
                    modalId = '#hs-add-company-modal';
                } else if (activeTab === 'internship' || '{{ $data }}' === 'internship') {
                    modalId = '#hs-add-internship-modal';
                }

                if (modalId && window.HSOverlay) {
                    const modalElement = document.querySelector(modalId);
                    if (modalElement) {
                        window.HSOverlay.open(modalElement);
                    } else {
                        console.error(`Modal element ${modalId} not found`);
                    }
                }
            });
        }

        // Listen for tab clicks
        if (tab1Link) {
            tab1Link.addEventListener('click', function() {
                setTimeout(updateAddDataText, 100); // Small delay to ensure classes are updated
            });
        }

        if (tab2Link) {
            tab2Link.addEventListener('click', function() {
                setTimeout(updateAddDataText, 100); // Small delay to ensure classes are updated
            });
        }

        // Initial update
        updateAddDataText();
    });

    let responsibilitySectionIndex = 0;

    function addResponsibilitySection() {
        responsibilitySectionIndex++;
        const container = document.getElementById('responsibilities-container');
        const newSection = document.createElement('div');
        newSection.className = 'responsibility-section border border-gray-200 rounded-lg p-4';
        newSection.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <label class="block text-sm font-medium">Section Title</label>
                <button type="button" class="text-sm text-red-600 hover:text-red-800"
                    onclick="removeResponsibilitySection(this)">Remove Section</button>
            </div>
            <div class="mb-3">
                <input type="text" name="responsibility_titles[]"
                    class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="e.g., Frontend Development" required>
            </div>
            <div class="responsibility-items">
                <label class="block mb-1 text-sm font-medium">Items</label>
                <div class="space-y-2">
                    <input type="text" name="responsibility_items[${responsibilitySectionIndex}][]"
                        class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Enter responsibility item" required>
                </div>
                <button type="button" class="mt-2 text-sm text-blue-600 add-item-btn hover:text-blue-800"
                    onclick="addResponsibilityItem(this)">+ Add Item</button>
            </div>
        `;
        container.appendChild(newSection);
    }

    function removeResponsibilitySection(button) {
        const section = button.closest('.responsibility-section');
        section.remove();
    }

    function addResponsibilityItem(button) {
        const itemsContainer = button.previousElementSibling;
        const sectionIndex = Array.from(document.querySelectorAll('.responsibility-section')).indexOf(button.closest('.responsibility-section'));
        const newItem = document.createElement('div');
        newItem.className = 'flex gap-2';
        newItem.innerHTML = `
            <input type="text" name="responsibility_items[${sectionIndex}][]"
                class="block px-3 py-2 w-full text-sm rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Enter responsibility item" required>
            <button type="button" class="px-2 text-sm text-red-600 hover:text-red-800"
                onclick="removeResponsibilityItem(this)">Remove</button>
        `;
        itemsContainer.appendChild(newItem);
    }

    function removeResponsibilityItem(button) {
        const item = button.parentElement;
        item.remove();
    }
</script>
