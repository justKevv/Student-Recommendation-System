@props(['user', 'no', 'role'])

<form action="{{ route('user.management.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div id="hs-edit-modal-{{ $no }}"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none flex items-center justify-center"
        role="dialog" tabindex="-1" aria-labelledby="hs-edit-modal-{{ $no }}-label">
        <div
            class="m-3 opacity-0 transition-all ease-out hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-2xl sm:w-full">
            <div class="flex flex-col bg-white rounded-xl border shadow-sm pointer-events-auto">
                <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-edit-modal-{{ $no }}-label" class="font-bold text-gray-800">
                        Edit {{ ucfirst($role) }}: {{ $user->name }}
                    </h3>
                    <button type="button"
                        class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-edit-modal-{{ $no }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 6-12 12"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4 max-h-96">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- User Information -->
                        <div class="space-y-4">
                            <h4 class="pb-2 font-semibold text-gray-800 border-b">User Information</h4>

                            <!-- Name -->
                            <div>
                                <label for="name-{{ $no }}"
                                    class="block mb-2 text-sm font-medium text-gray-800">Name</label>
                                <input type="text" id="name-{{ $no }}" name="name"
                                    value="{{ $user->name ?? '' }}"
                                    class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                    required>
                                <p class="mt-1 text-xs text-transparent">Placeholder text for alignment</p>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email-{{ $no }}"
                                    class="block mb-2 text-sm font-medium text-gray-800">Email</label>
                                <input type="email" id="email-{{ $no }}" name="email"
                                    value="{{ $user->email ?? '' }}"
                                    class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                    readonly disabled>
                                <p class="mt-1 text-xs text-gray-500">Email cannot be changed</p>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone-{{ $no }}"
                                    class="block mb-2 text-sm font-medium text-gray-800">Phone</label>
                                <input type="text" id="phone-{{ $no }}" name="phone"
                                    value="{{ $user->phone ?? '' }}"
                                    class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none">
                                <p class="mt-1 text-xs text-transparent">Placeholder text for alignment</p>
                            </div>
                        </div>

                        <!-- Role-specific Information -->
                        <div class="space-y-4">
                            @if ($role === 'student')
                                <h4 class="pb-2 font-semibold text-gray-800 border-b">Student Information</h4>

                                <!-- NIM -->
                                <div>
                                    <label for="nim-{{ $no }}"
                                        class="block mb-2 text-sm font-medium text-gray-800">NIM</label>
                                    <input type="text" id="nim-{{ $no }}" name="nim"
                                        value="{{ $user->student->nim ?? '' }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                        readonly disabled>
                                    <p class="mt-1 text-xs text-gray-500">NIM cannot be changed</p>
                                </div>

                                <!-- Study Program -->
                                <div>
                                    <label for="study_program-{{ $no }}"
                                        class="block mb-2 text-sm font-medium text-gray-800">Study Program</label>
                                    <select id="study_program-{{ $no }}" name="study_program"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none">
                                        <option value="informatics_engineering"
                                            {{ ($user->student->study_program ?? '') === 'Informatics Engineering' ? 'selected' : '' }}>
                                            Informatics Engineering</option>
                                        <option value="business_information_systems"
                                            {{ ($user->student->study_program ?? '') === 'Business Information Systems' ? 'selected' : '' }}>
                                            Business Information Systems</option>
                                    </select>
                                    <p class="mt-1 text-xs text-transparent">Placeholder text for alignment</p>
                                </div>

                                <!-- Semester -->
                                <div>
                                    <label for="semester-{{ $no }}"
                                        class="block mb-2 text-sm font-medium text-gray-800">Semester</label>
                                    <select id="semester-{{ $no }}" name="semester"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none">
                                        <option value="">Select Semester</option>
                                        @for ($i = 1; $i <= 8; $i++)
                                            <option value="{{ $i }}"
                                                {{ ($user->student->semester ?? '') == $i ? 'selected' : '' }}>Semester
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            @else
                                <h4 class="pb-2 font-semibold text-gray-800 border-b">{{ ucfirst($role) }} Information</h4>

                                <!-- Role -->
                                <div>
                                    <label for="role-{{ $no }}"
                                        class="block mb-2 text-sm font-medium text-gray-800">Role</label>
                                    <input type="text" id="role-{{ $no }}" name="role"
                                        value="{{ ucfirst($user->role) }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                        readonly disabled>
                                    <p class="mt-1 text-xs text-gray-500">Role cannot be changed</p>
                                </div>

                                <!-- Account Created -->
                                <div>
                                    <label for="created_at-{{ $no }}"
                                        class="block mb-2 text-sm font-medium text-gray-800">Account Created</label>
                                    <input type="text" id="created_at-{{ $no }}" name="created_at"
                                        value="{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}"
                                        class="block px-4 py-3 w-full text-sm rounded-lg border border-gray-200 focus:border-yellowgoon focus:ring-yellowgoon disabled:opacity-50 disabled:pointer-events-none"
                                        readonly disabled>
                                    <p class="mt-1 text-xs text-gray-500">Account creation date</p>
                                </div>

                                <!-- Empty placeholder for alignment -->
                                <div>
                                    <p class="mt-1 text-xs text-transparent">Placeholder for alignment</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-edit-modal-{{ $no }}">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-none focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
