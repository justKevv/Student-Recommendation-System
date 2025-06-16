{{-- resources/views/components/profup/research-interest.blade.php --}}
@props([
    'researchInterests' => [],
    'userId' => null,
])

<div class="w-full bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 min-h-[120px]">
    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Research Interest</h2>
    <div class="flex flex-wrap gap-3 items-start">
        @foreach ($researchInterests as $interest)
            <span
                class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">{{ $interest }}</span>
        @endforeach
        @if (auth()->user()->role != 'admin')
            <button
                class="inline-flex items-center justify-center w-12 h-10 rounded-[15px] bg-main text-white hover:bg-gray-700 transition-colors duration-200"
                aria-haspopup="dialog" aria-expanded="false"
                aria-controls="hs-vertically-centered-modal-research-interest-{{ $userId }}"
                data-hs-overlay="#hs-vertically-centered-modal-research-interest-{{ $userId }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        @endif
    </div>
</div>

<div id="hs-vertically-centered-modal-research-interest-{{ $userId }}"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 pointer-events-none hs-overlay size-full start-0 z-80"
    role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label-{{ $userId }}">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-600 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 pointer-events-auto shadow-2xs">
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                <h3 id="hs-vertically-centered-modal-label-{{ $userId }}" class="font-bold text-gray-800">
                    Add Research Interest
                </h3>
                <button type="button"
                    class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close"
                    data-hs-overlay="#hs-vertically-centered-modal-research-interest-{{ $userId }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto p-4">
                <div class="mb-6">
                    <h4 class="mb-2 text-sm font-medium text-gray-700">Current Research Interests:</h4>
                    <div id="research-interests-display-{{ $userId }}" class="flex flex-wrap gap-3">
                        @foreach ($researchInterests as $interest)
                            <span
                                class="research-interest-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">
                                {{ $interest }}
                                <button type="button"
                                    class="hidden absolute -top-1 -right-1 w-4 h-4 text-xs leading-none text-white rounded-full bg-redgoon group-hover:block"
                                    onclick="removeResearchInterestFromModal(this, {{ $userId }})">
                                    ×
                                </button>
                            </span>
                        @endforeach
                        @if (empty($researchInterests))
                            <div id="no-research-interests-{{ $userId }}" class="text-sm italic text-gray-400">No
                                research interests added yet</div>
                        @endif
                    </div>
                </div>
                <div class="flex gap-2">
                    <input type="text" id="research-input-{{ $userId }}"
                        class="flex-1 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellowgoon"
                        placeholder="Enter research interest"
                        onkeypress="if(event.key==='Enter') addResearchInterestToModal({{ $userId }})"
                        autoFocus="">
                    <button type="button" class="px-4 py-2 rounded-md bg-main text-yellowgoon hover:bg-gray-600"
                        onclick="addResearchInterestToModal({{ $userId }})">
                        <div data-svg-wrapper>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.12435 16.8337C8.12435 17.1983 8.26921 17.5481 8.52708 17.8059C8.78494 18.0638 9.13468 18.2087 9.49935 18.2087C9.86402 18.2087 10.2138 18.0638 10.4716 17.8059C10.7295 17.5481 10.8743 17.1983 10.8743 16.8337V10.8753H16.8327C17.1974 10.8753 17.5471 10.7305 17.805 10.4726C18.0628 10.2147 18.2077 9.865 18.2077 9.50033C18.2077 9.13565 18.0628 8.78592 17.805 8.52805C17.5471 8.27019 17.1974 8.12533 16.8327 8.12533H10.8743V2.16699C10.8743 1.80232 10.7295 1.45258 10.4716 1.19472C10.2138 0.936858 9.86402 0.791992 9.49935 0.791992C9.13468 0.791992 8.78494 0.936858 8.52708 1.19472C8.26921 1.45258 8.12435 1.80232 8.12435 2.16699V8.12533H2.16602C1.80134 8.12533 1.45161 8.27019 1.19374 8.52805C0.935881 8.78592 0.791016 9.13565 0.791016 9.50033C0.791016 9.865 0.935881 10.2147 1.19374 10.4726C1.45161 10.7305 1.80134 10.8753 2.16602 10.8753H8.12435V16.8337Z"
                                    fill="#FFFFFF" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
            <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                <button type="button"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-vertically-centered-modal-research-interest-{{ $userId }}">
                    Close
                </button>
                <button type="button"
                    class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent transition bg-main text-yellowgoon hover:bg-gray-700 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none"
                    onclick="saveResearchInterests({{ $userId }})">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let tempResearchInterests = {};

    // Initialize temp array when modal opens
    function initResearchInterestsModal(userId) {
        if (!tempResearchInterests[userId]) {
            tempResearchInterests[userId] = [];
            // Get current interests from the display
            const displayDiv = document.getElementById(`research-interests-display-${userId}`);
            const interestItems = displayDiv.querySelectorAll('.research-interest-item');
            interestItems.forEach(item => {
                const text = item.textContent.trim().replace('×', '').trim();
                if (text) {
                    tempResearchInterests[userId].push(text);
                }
            });
        }
    }

    function addResearchInterestToModal(userId) {
        const input = document.getElementById(`research-input-${userId}`);
        const interest = input.value.trim();

        if (interest && !tempResearchInterests[userId].includes(interest)) {
            tempResearchInterests[userId].push(interest);
            updateResearchInterestsDisplay(userId);
            input.value = '';
        }
    }

    // Remove research interest from modal (frontend only)
    function removeResearchInterestFromModal(button, userId) {
        const interestText = button.parentElement.textContent.trim().replace('×', '').trim();
        const index = tempResearchInterests[userId].indexOf(interestText);
        if (index > -1) {
            tempResearchInterests[userId].splice(index, 1);
            updateResearchInterestsDisplay(userId);
        }
    }

    // Update the display of research interests in modal
    function updateResearchInterestsDisplay(userId) {
        const displayDiv = document.getElementById(`research-interests-display-${userId}`);
        const noInterestsDiv = document.getElementById(`no-research-interests-${userId}`);

        // Clear current display
        displayDiv.innerHTML = '';

        if (tempResearchInterests[userId].length === 0) {
            displayDiv.innerHTML =
                `<div id="no-research-interests-${userId}" class="text-sm italic text-gray-400">No research interests added yet</div>`;
        } else {
            tempResearchInterests[userId].forEach(interest => {
                const span = document.createElement('span');
                span.className =
                    'research-interest-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-[\'Poppins\'] rounded-[15px]';
                span.innerHTML = `
        ${interest}
        <button type="button" class="hidden absolute -top-1 -right-1 w-4 h-4 text-xs leading-none text-white rounded-full bg-redgoon group-hover:block" onclick="removeResearchInterestFromModal(this, ${userId})">
          ×
        </button>
      `;
                displayDiv.appendChild(span);
            });
        }
    }

    // Save research interests to database
    function saveResearchInterests(userId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/profile/update-research-interests', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    research_interests: tempResearchInterests[userId] || []
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the main page display
                    location.reload();
                } else {
                    alert('Error updating research interests');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating research interests');
            });
    }

    // Initialize when modal is opened
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize when the modal button is clicked
        const modalTrigger = document.querySelector(
            '[data-hs-overlay="#hs-vertically-centered-modal-research-interest-{{ $userId }}"]');
        if (modalTrigger) {
            modalTrigger.addEventListener('click', function() {
                setTimeout(() => {
                    initResearchInterestsModal({{ $userId }});
                }, 100);
            });
        }
    });
</script>
