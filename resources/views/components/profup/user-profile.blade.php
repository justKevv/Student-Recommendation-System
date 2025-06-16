{{-- resources/views/components/profup/user-profile.blade.php --}}
@props([
    'name' => 'Adevian Fairuz',
    'role' => 'Supervisor',
    'location' => 'Malang, Indonesia',
    'avatarImage' => 'https://placehold.co/96x96', // This should be the path to the user's profile image
])

{{-- Top Profile Card --}}
<div
    class="bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 flex items-center gap-6 mb-8">
    {{-- Profile Picture with Edit Functionality --}}
    <div class="relative">
        <img id="profile-preview" class="object-cover w-24 h-24 rounded-full" src="{{ $avatarImage }}"
            alt="Profile Picture">
        @if (auth()->user()->role != 'admin')
            <button id="edit-photo-btn"
                class="flex absolute -right-2 -bottom-2 justify-center items-center w-8 h-8 text-white rounded-full transition-colors bg-main hover:bg-gray-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
            <input type="file" id="profile-photo-input" class="hidden" accept="image/*">
        @endif
    </div>

    <div>
        <h1 class="text-main text-2xl font-semibold font-['Poppins']">{{ $name }}</h1>
        <p class="text-neutral-500 text-base font-normal font-['Poppins']">{{ $role }}</p>
        <p class="text-neutral-500 text-base font-normal font-['Poppins']">{{ $location }}</p>
    </div>
</div>

{{-- Toast Notifications --}}
<!-- Success Toast -->
<div id="success-toast"
    class="hidden fixed top-4 right-4 z-50 max-w-xs bg-white rounded-xl border border-green-200 shadow-lg transition duration-300 hs-removing:translate-x-5 hs-removing:opacity-0"
    role="alert" tabindex="-1" aria-labelledby="success-toast-label">
    <div class="flex p-4">
        <div class="flex-shrink-0">
            <svg class="mt-0.5 w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.061L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
        </div>
        <div class="ms-3">
            <p id="success-toast-label" class="text-sm font-medium text-gray-700">
                Success message
            </p>
        </div>
        <div class="ms-auto">
            <button type="button"
                class="inline-flex justify-center items-center text-gray-800 rounded-lg opacity-50 shrink-0 size-5 hover:opacity-100 focus:outline-none focus:opacity-100"
                aria-label="Close" data-hs-remove-element="#success-toast">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Error Toast -->
<div id="error-toast"
    class="hidden fixed top-4 right-4 z-50 max-w-xs bg-white rounded-xl border border-red-200 shadow-lg transition duration-300 hs-removing:translate-x-5 hs-removing:opacity-0"
    role="alert" tabindex="-1" aria-labelledby="error-toast-label">
    <div class="flex p-4">
        <div class="flex-shrink-0">
            <svg class="mt-0.5 w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
        </div>
        <div class="ms-3">
            <p id="error-toast-label" class="text-sm font-medium text-gray-700">
                Error message
            </p>
        </div>
        <div class="ms-auto">
            <button type="button"
                class="inline-flex justify-center items-center text-gray-800 rounded-lg opacity-50 shrink-0 size-5 hover:opacity-100 focus:outline-none focus:opacity-100"
                aria-label="Close" data-hs-remove-element="#error-toast">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

{{-- JavaScript for Profile Photo Upload --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profilePhotoInput = document.getElementById('profile-photo-input');
        const profilePreview = document.getElementById('profile-preview');
        const editPhotoBtn = document.getElementById('edit-photo-btn');

        if (editPhotoBtn && profilePhotoInput && profilePreview) {
            editPhotoBtn.addEventListener('click', () => {
                profilePhotoInput.click();
            });

            profilePhotoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Immediate preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profilePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Upload to server
                    uploadProfilePhoto(file);
                }
            });
        }

        function uploadProfilePhoto(file) {
            const formData = new FormData();
            formData.append('profile_picture', file);

            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                formData.append('_token', csrfToken.getAttribute('content'));
            }

            fetch('/profile/upload-photo', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.json();
                })
                .then(data => {
                    console.log('Upload response:', data);
                    if (data.success) {
                        // Update the profile picture preview with cache busting
                        if (data.profile_picture_url) {
                            // Add timestamp to force browser to reload the image
                            const timestamp = new Date().getTime();
                            profilePreview.src = data.profile_picture_url + '?t=' + timestamp;
                        }

                        // Update the topbar profile image with cache busting
                        const topbarProfileImg = document.querySelector('#profile-topbar');
                        if (topbarProfileImg && data.profile_picture_url) {
                            // Add timestamp to force browser to reload the image
                            const timestamp = new Date().getTime();
                            topbarProfileImg.src = data.profile_picture_url + '?t=' + timestamp;
                        }

                        showToast('Profile picture updated successfully!', 'success');
                    } else {
                        showToast('Upload failed: ' + (data.message || 'Unknown error'), 'error');
                    }
                })
                .catch(error => {
                    console.error('Error uploading photo:', error);
                    showToast('Error uploading photo: ' + error.message, 'error');
                });
        }

        // Function to show toast notifications
        function showToast(message, type) {
            const toastId = type === 'success' ? 'success-toast' : 'error-toast';
            const labelId = type === 'success' ? 'success-toast-label' : 'error-toast-label';

            const toast = document.getElementById(toastId);
            const label = document.getElementById(labelId);

            if (toast && label) {
                // Update the message
                label.textContent = message;

                // Start with toast positioned off-screen (translated right)
                toast.style.transform = 'translateX(100%)';
                toast.style.opacity = '0';

                // Show the toast
                toast.classList.remove('hidden');

                // Trigger slide-in animation after a brief delay
                setTimeout(() => {
                    toast.style.transform = 'translateX(0)';
                    toast.style.opacity = '1';
                }, 10);

                // Auto-hide after 5 seconds
                setTimeout(() => {
                    if (toast && !toast.classList.contains('hidden')) {
                        toast.classList.add('hs-removing');
                        setTimeout(() => {
                            toast.classList.add('hidden');
                            toast.classList.remove('hs-removing');
                            // Reset transform for next use
                            toast.style.transform = '';
                            toast.style.opacity = '';
                        }, 300); // Wait for animation to complete
                    }
                }, 5000);
            }
        }
    });
</script>
