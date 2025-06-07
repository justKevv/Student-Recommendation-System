@props([
    'data' => 'intership',
    'tab1' => 'user',
    'tab2' => 'company',
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
                            <input type="tel" id="phone-input" name="phone" :disabled="selectedRole !== 'student'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08821323133">
                        </div>
                        <div class="w-full">
                            <label for="semester-input" class="block mb-2 text-sm font-medium">Semester</label>
                            <input type="text" id="semester-input" name="semester" :disabled="selectedRole !== 'student'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="6 (Semester)">
                        </div>
                    </div>
                    <div x-show="selectedRole == 'supervisor' && selectedRole !== 'Select Role'" class="space-y-3">
                        <hr class="my-4 border-gray-200">
                        <div class="w-full">
                            <label for="supervisor-name-input" class="block mb-2 text-sm font-medium">Name</label>
                            <input type="text" id="supervisor-name-input" name="name" :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Dr. John Doe">
                        </div>
                        <div class="w-full">
                            <label for="supervisor-phone-input" class="block mb-2 text-sm font-medium">Phone</label>
                            <input type="tel" id="supervisor-phone-input" name="phone" :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="08821323133">
                        </div>
                        <div class="w-full">
                            <label for="teaching-start-year-input" class="block mb-2 text-sm font-medium">Teaching
                                Start Year</label>
                            <input type="number" id="teaching-start-year-input" name="teaching_start_year" :disabled="selectedRole !== 'supervisor'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="2024" min="1990" max="2030">
                        </div>
                    </div>
                    <div x-show="selectedRole == 'admin' && selectedRole !== 'Select Role'" class="space-y-3">
                        <hr class="my-4 border-gray-200">
                        <div class="w-full">
                            <label for="admin-name-input" class="block mb-2 text-sm font-medium">Name</label>
                            <input type="text" id="admin-name-input" name="name" :disabled="selectedRole !== 'admin'"
                                class="block px-4 py-2.5 w-full rounded-lg border border-gray-200 sm:py-3 sm:text-sm focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="John Smith">
                        </div>
                        <div class="w-full">
                            <label for="admin-phone-input" class="block mb-2 text-sm font-medium">Phone</label>
                            <input type="tel" id="admin-phone-input" name="phone" :disabled="selectedRole !== 'admin'"
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
                <p class="mt-1 text-gray-800">
                    This is the company modal. You can add form fields here to create a new company.
                </p>
            </div>
            <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                <button type="button"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-add-company-modal">
                    Close
                </button>
                <button type="button"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-white bg-green-600 rounded-lg border border-transparent hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save Company
                </button>
            </div>
        </div>
    </div>
</div>

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
</script>
