@extends('student.layout.app')

@section('content')
    <div class="flex flex-col justify-center items-center p-6 min-h-screen">
        <div class="w-full max-w-2xl">
            <h1 class="mb-8 text-3xl font-bold text-center text-gray-800">Your Skills</h1>

            <div class="w-full bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 min-h-[120px]">
                <h2 class="mb-6 text-2xl font-semibold text-gray-800">Technical Skills</h2>
                <div class="flex flex-wrap gap-3 items-start">
                    @foreach($skills as $skill)
                        <span class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">{{ $skill }}</span>
                    @endforeach
                    <button class="inline-flex items-center justify-center w-12 h-10 rounded-[15px] bg-main text-white hover:bg-gray-700 transition-colors duration-200" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-vertically-centered-modal-skills" data-hs-overlay="#hs-vertically-centered-modal-skills">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('student.experience') }}" class="inline-flex gap-x-2 items-center px-6 py-3 text-sm font-medium rounded-lg border border-transparent text-yellowgoon bg-main hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700">
                    Next →
                </a>
            </div>
        </div>
    </div>

    <!-- Skills Modal -->
    <div id="hs-vertically-centered-modal-skills" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 pointer-events-none hs-overlay size-full start-0 z-80" role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label-skills">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-600 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="flex flex-col w-full bg-white rounded-xl border border-gray-200 pointer-events-auto shadow-2xs">
                <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200">
                    <h3 id="hs-vertically-centered-modal-label-skills" class="font-bold text-gray-800">
                        Add Skills
                    </h3>
                    <button type="button" class="inline-flex gap-x-2 justify-center items-center text-gray-800 bg-gray-100 rounded-full border border-transparent size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal-skills">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4">
                    <div class="mb-6">
                        <h4 class="mb-2 text-sm font-medium text-gray-700">Current Skills:</h4>
                        <div id="skills-display" class="flex flex-wrap gap-3">
                            @foreach($skills as $skill)
                                <span class="skill-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">
                                    {{ $skill }}
                                    <button type="button" class="hidden absolute -top-1 -right-1 w-4 h-4 text-xs leading-none text-white rounded-full bg-redgoon group-hover:block" onclick="removeSkillFromModal(this)">
                                        ×
                                    </button>
                                </span>
                            @endforeach
                            @if(empty($skills))
                                <div id="no-skills" class="text-sm italic text-gray-400">No skills added yet</div>
                            @endif
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" id="skill-input" class="px-3 py-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellowgoon" placeholder="Enter skill" onkeypress="if(event.key==='Enter') addSkillToModal()" autofocus>
                        <button type="button" class="px-4 py-2 rounded-md bg-main text-yellowgoon hover:bg-gray-600" onclick="addSkillToModal()">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.12435 16.8337C8.12435 17.1983 8.26921 17.5481 8.52708 17.8059C8.78494 18.0638 9.13468 18.2087 9.49935 18.2087C9.86402 18.2087 10.2138 18.0638 10.4716 17.8059C10.7295 17.5481 10.8743 17.1983 10.8743 16.8337V10.8753H16.8327C17.1974 10.8753 17.5471 10.7305 17.805 10.4726C18.0628 10.2147 18.2077 9.865 18.2077 9.50033C18.2077 9.13565 18.0628 8.78592 17.805 8.52805C17.5471 8.27019 17.1974 8.12533 16.8327 8.12533H10.8743V2.16699C10.8743 1.80232 10.7295 1.45258 10.4716 1.19472C10.2138 0.936858 9.86402 0.791992 9.49935 0.791992C9.13468 0.791992 8.78494 0.936858 8.52708 1.19472C8.26921 1.45258 8.12435 1.80232 8.12435 2.16699V8.12533H2.16602C1.80134 8.12533 1.45161 8.27019 1.19374 8.52805C0.935881 8.78592 0.791016 9.13565 0.791016 9.50033C0.791016 9.865 0.935881 10.2147 1.19374 10.4726C1.45161 10.7305 1.80134 10.8753 2.16602 10.8753H8.12435V16.8337Z" fill="#FFFFFF"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex gap-x-2 justify-end items-center px-4 py-3 border-t border-gray-200">
                    <button type="button" class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white rounded-lg border border-gray-200 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-vertically-centered-modal-skills">
                        Close
                    </button>
                    <button type="button" class="inline-flex gap-x-2 items-center px-3 py-2 text-sm font-medium rounded-lg border border-transparent bg-main text-yellowgoon hover:bg-gray-700 focus:outline-hidden focus:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none" onclick="saveSkills()">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let tempSkills = [];

        function initSkillsModal() {
            tempSkills = [];
            const displayDiv = document.getElementById('skills-display');
            const skillItems = displayDiv.querySelectorAll('.skill-item');
            skillItems.forEach(item => {
                const text = item.textContent.trim().replace('×', '').trim();
                if (text) {
                    tempSkills.push(text);
                }
            });
        }

        function addSkillToModal() {
            const input = document.getElementById('skill-input');
            const skill = input.value.trim();

            if (skill && !tempSkills.includes(skill)) {
                tempSkills.push(skill);
                updateSkillsDisplay();
                input.value = '';
            }
        }

        function removeSkillFromModal(button) {
            const skillText = button.parentElement.textContent.trim().replace('×', '').trim();
            const index = tempSkills.indexOf(skillText);
            if (index > -1) {
                tempSkills.splice(index, 1);
                updateSkillsDisplay();
            }
        }

        function updateSkillsDisplay() {
            const displayDiv = document.getElementById('skills-display');
            displayDiv.innerHTML = '';

            if (tempSkills.length === 0) {
                displayDiv.innerHTML = '<div id="no-skills" class="text-sm italic text-gray-400">No skills added yet</div>';
            } else {
                tempSkills.forEach(skill => {
                    const span = document.createElement('span');
                    span.className = 'skill-item group relative px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-[\'Poppins\'] rounded-[15px]';
                    span.innerHTML = `
                        ${skill}
                        <button type="button" class="hidden absolute -top-1 -right-1 w-4 h-4 text-xs leading-none text-white rounded-full bg-redgoon group-hover:block" onclick="removeSkillFromModal(this)">
                            ×
                        </button>
                    `;
                    displayDiv.appendChild(span);
                });
            }
        }

        function saveSkills() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('{{ route('student.skills.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    skills: tempSkills
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error updating skills');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating skills');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modalTrigger = document.querySelector('[data-hs-overlay="#hs-vertically-centered-modal-skills"]');
            if (modalTrigger) {
                modalTrigger.addEventListener('click', function() {
                    setTimeout(() => {
                        initSkillsModal();
                    }, 100);
                });
            }
        });
    </script>
@endsection
