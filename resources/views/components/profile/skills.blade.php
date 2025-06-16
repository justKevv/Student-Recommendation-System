@props([
    'skills' => ['Java', 'HTML', 'CSS', 'JavaScript', 'Leadership', 'REST', 'IoT', 'AI'],
    'addicon' => true,
    'editicon' => true,
    'userId' => null
])

<div class="w-[650px] bg-white rounded-[30px] shadow-md p-6 space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">Skill</h2>
        <div class="flex space-x-3">
            @if (auth()->user()->role != 'admin' && auth()->user()->role != 'supervisor')
                <x-add-icon modal_type="skills" userId="{{ $userId }}"></x-add-icon>
            @endif
        </div>
    </div>

<div class="flex flex-wrap gap-2">
        @foreach ($skills as $skill)
            <span
                class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">
                {{ $skill }}
            </span>
        @endforeach
    </div>
</div>


<div id="hs-vertically-centered-modal-add-skills-area-{{ $userId }}"
    class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
    role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-add-label-{{ $userId }}">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-600 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="flex flex-col w-full bg-white border border-gray-200 pointer-events-auto rounded-xl shadow-2xs">
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <h3 id="hs-vertically-centered-modal-add-label-{{ $userId }}" class="font-bold text-gray-800">
                    Add Skills
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full gap-x-2 size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close"
                    data-hs-overlay="#hs-vertically-centered-modal-add-skills-area-{{ $userId }}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div class="mb-6">
                    <h4 class="mb-2 text-sm font-medium text-gray-700">Current Skills:</h4>
                    <div id="skills-area-display-{{ $userId }}" class="flex flex-wrap gap-3">
                        @foreach ($skills as $area)
                            <span
                                class="skills-area-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">
                                {{ $area }}
                                <button type="button"
                                    class="absolute hidden w-4 h-4 text-xs leading-none text-white rounded-full -top-1 -right-1 bg-redgoon group-hover:block"
                                    onclick="removeSkillsAreaFromModal(this, {{ $userId }})">
                                    ×
                                </button>
                            </span>
                        @endforeach
                        @if (empty($skills))
                            <div id="no-skills-areas-{{ $userId }}" class="text-sm italic text-gray-400">No
                                skills added yet</div>
                        @endif
                    </div>
                </div>
                <div class="flex gap-2">
                    <input type="text" id="skills-input-{{ $userId }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-yellowgoon"
                        placeholder="Enter skills"
                        onkeypress="if(event.key==='Enter') addSkillAreaToModal({{ $userId }})"
                        autoFocus="">
                    <button type="button" class="px-4 py-2 rounded-md bg-main text-yellowgoon hover:bg-gray-600"
                        onclick="addSkillAreaToModal({{ $userId }})">
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
            <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2">
                <button type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg gap-x-2 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-vertically-centered-modal-add-skills-area-{{ $userId }}">
                    Close
                </button>
                <button type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 bg-main text-yellowgoon hover:bg-gray-700 focus:outline-hidden focus:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none"
                    onclick="saveExpertiseArea({{ $userId }})">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let tempSkillsAreas = {};

    function initSkillsAreasModal(userId) {
        if (!tempSkillsAreas[userId]) {
            tempSkillsAreas[userId] = [];

            const displayDiv = document.getElementById(`skills-area-display-${userId}`);
            const skillItems = displayDiv.querySelectorAll('.skills-area-item');
            skillItems.forEach(item => {
                const text = item.textContent.trim().replace('×', '').trim();
                if (text) {
                    tempSkillsAreas[userId].push(text);
                }
            });
        }
    }

    function addSkillAreaToModal(userId) {
        const input = document.getElementById(`skills-input-${userId}`);
        const skills = input.value.trim();

        if (skills && !tempSkillsAreas[userId].includes(skills)) {
            tempSkillsAreas[userId].push(skills);
            updateSkillsAreasDisplay(userId);
            input.value = '';
        }
    }

    function removeSkillsAreaFromModal(button, userId) {
        const skillText = button.parentElement.textContent.trim().replace('×', '').trim();
        const index = tempSkillsAreas[userId].indexOf(skillText);
        if (index > -1) {
            tempSkillsAreas[userId].splice(index, 1);
            updateSkillsAreasDisplay(userId);
        }
    }

    function updateSkillsAreasDisplay(userId) {
        const displayDiv = document.getElementById(`skills-area-display-${userId}`);
        const noExpertiseDiv = document.getElementById(`no-skills-areas-${userId}`);

        displayDiv.innerHTML = '';

        if (tempSkillsAreas[userId].length === 0) {
            displayDiv.innerHTML =
                `<div id="no-skills-areas-${userId}" class="text-sm italic text-gray-400">No skills area added yet</div>`;
        } else {
            tempSkillsAreas[userId].forEach(skills => {
                const span = document.createElement('span');
                span.className =
                    'skills-area-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-[\'Poppins\'] rounded-[15px]';
                span.innerHTML = `
                    ${skills}
                    <button type="button" class="absolute hidden w-4 h-4 text-xs leading-none text-white rounded-full -top-1 -right-1 bg-redgoon group-hover:block" onclick="removeSkillsAreaFromModal(this, ${userId})">
                        ×
                    </button>
                `;
                displayDiv.appendChild(span);
            });
        }
    }

    function saveExpertiseArea(userId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch('/profile/update-skills', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    skills: tempSkillsAreas[userId] || []
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error updating skills areas');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating skills areas');
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modalTrigger = document.querySelector(
            '[data-hs-overlay="#hs-vertically-centered-modal-add-skills-area-{{ $userId }}"]');
        if (modalTrigger) {
            modalTrigger.addEventListener('click', function() {
                setTimeout(() => {
                    initSkillsAreasModal({{ $userId }});
                }, 100);
            });
        }
    })
</script>
