@extends('student.layout.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="mb-8 text-3xl font-bold text-gray-800">Let's setup your account</h1>
        <button type="button"
            class="inline-flex items-center px-4 py-3 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-vertically-centered-modal"
            data-hs-overlay="#hs-vertically-centered-modal">
            Click
        </button>
    </div>



    <div id="hs-vertically-centered-modal"
        class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
        role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="flex flex-col w-full bg-white border border-gray-200 pointer-events-auto rounded-xl shadow-2xs">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-vertically-centered-modal-label" class="font-bold text-gray-800">
                        Set Your Password
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="passwordForm" class="p-4 overflow-y-auto"
                    action="{{ route('student.password.onboarding.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="new_password" class="block mb-2 text-sm font-medium text-gray-700">
                                New Password
                            </label>
                            <input type="password" id="new_password" name="new_password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:border-transparent"
                                placeholder="Enter your new password" minlength="8">
                            <p class="mt-1 text-xs text-gray-500">Password must be at least 8 characters long</p>
                        </div>

                        <div>
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-700">
                                Confirm Password
                            </label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:border-transparent"
                                placeholder="Confirm your password">
                            <p id="password-error" class="hidden mt-1 text-xs text-red-500">Passwords do not match</p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="show_password" class="mr-2">
                            <label for="show_password" class="text-sm text-gray-700">Show passwords</label>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-vertically-centered-modal">
                            Cancel
                        </button>
                        <button type="submit" id="savePassword"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                            Set Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('new_password_confirmation');
            const showPasswordCheckbox = document.getElementById('show_password');
            const passwordError = document.getElementById('password-error');

            // Show/Hide password functionality
            showPasswordCheckbox.addEventListener('change', function() {
                const type = this.checked ? 'text' : 'password';
                newPasswordInput.type = type;
                confirmPasswordInput.type = type;
            });

            // Password validation
            function validatePasswords() {
                const newPassword = newPasswordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (newPassword.length < 8) {
                    return false;
                }

                if (newPassword !== confirmPassword) {
                    passwordError.classList.remove('hidden');
                    return false;
                } else {
                    passwordError.classList.add('hidden');
                    return true;
                }
            }

            // Real-time validation
            confirmPasswordInput.addEventListener('input', validatePasswords);
            newPasswordInput.addEventListener('input', validatePasswords);
        });
    </script>
@endsection
