import './bootstrap';
import 'preline';
import 'dropzone';
import 'lodash';
import Alpine from 'alpinejs';

Alpine.start();

// Topbar scroll shadow effect
document.addEventListener('DOMContentLoaded', function() {
    const topbar = document.getElementById('topbar');

    if (topbar) {
        function handleScroll() {
            if (window.scrollY > 10) {
                topbar.classList.add('shadow-sm');
            } else {
                topbar.classList.remove('shadow-sm');
            }
        }

        // Initial check
        handleScroll();

        // Listen for scroll events
        window.addEventListener('scroll', handleScroll);
    }

    // Last seen internships functionality
    initLastSeenInternships();
});

// Function to save internship to localStorage when clicked
function saveToLastSeen(internshipData) {
    let lastSeen = JSON.parse(localStorage.getItem('lastSeenInternships')) || [];

    // Remove if already exists to avoid duplicates
    lastSeen = lastSeen.filter(item => item.id !== internshipData.id);

    // Add to beginning of array
    lastSeen.unshift(internshipData);

    // Keep only last 3 items
    lastSeen = lastSeen.slice(0, 3);

    localStorage.setItem('lastSeenInternships', JSON.stringify(lastSeen));
}

// Function to initialize last seen internships functionality
function initLastSeenInternships() {
    // Add click listeners to internship cards
    const internshipCards = document.querySelectorAll('[data-internship-card]');
    internshipCards.forEach(card => {
        card.addEventListener('click', function() {
            const internshipData = {
                id: this.dataset.internshipId,
                title: this.dataset.internshipTitle,
                company: this.dataset.internshipCompany,
                location: this.dataset.internshipLocation,
                type: this.dataset.internshipType,
                href: this.dataset.internshipHref,
                imageUrl: this.dataset.internshipImage || 'https://placehold.co/40x40',
                companyLogo: this.dataset.companyLogo || null
            };

            saveToLastSeen(internshipData);
        });
    });

    // Load and display last seen internships on student dashboard
    loadLastSeenInternships();
}

// Function to load and display last seen internships
function loadLastSeenInternships() {
    const lastSeenContainer = document.querySelector('[data-last-seen-container]');

    if (!lastSeenContainer) return;

    const lastSeen = JSON.parse(localStorage.getItem('lastSeenInternships')) || [];

    // Clear existing content
    lastSeenContainer.innerHTML = '';

    if (lastSeen.length === 0) {
        // Show placeholder if no last seen items
        for (let i = 0; i < 3; i++) {
            lastSeenContainer.innerHTML += `
                <div class="flex flex-col flex-shrink-0 gap-3 w-80">
                    <div class="block group">
                        <div class="flex flex-col gap-2">
                            <div class="relative overflow-hidden rounded-[20px]">
                                <img class="object-cover w-full h-36 bg-gray-200" src="https://placehold.co/320x144/e5e7eb/9ca3af?text=No+Recent+Views" alt="No recent views" loading="lazy" />
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-zinc-400 text-base font-medium font-['Poppins']">No recent views</h3>
                                <p class="text-zinc-400 text-xs font-normal font-['Poppins'] opacity-75">Browse internships to see them here</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-neutral-400 text-[10px] font-normal font-['Poppins']">-</span>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img class="object-cover bg-gray-200 rounded-full size-7" src="https://placehold.co/28x28/e5e7eb/9ca3af" alt="" loading="lazy" />
                        <span class="text-zinc-400 text-xs font-normal font-['Poppins']">-</span>
                    </div>
                </div>
            `;
        }
        return;
    }

    lastSeen.forEach(item => {
        lastSeenContainer.innerHTML += `
            <div class="flex flex-col flex-shrink-0 gap-3 w-80">
                <a href="${item.href}" class="block group">
                    <div class="flex flex-col gap-2">
                        <div class="relative overflow-hidden rounded-[20px]">
                            <img class="object-cover w-full h-36 transition-transform duration-500 group-hover:scale-110" src="${item.imageUrl}" alt="${item.title}" loading="lazy" />
                            <div class="absolute inset-0 transition-all duration-300 bg-black/0 group-hover:bg-black/10"></div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <h3 class="text-zinc-800 text-base font-medium font-['Poppins'] line-clamp-1 group-hover:text-yellowgoon transition-colors duration-300">${item.title}</h3>
                            <p class="text-zinc-600 text-xs font-normal font-['Poppins'] opacity-75">${item.company}</p>
                        </div>
                    </div>
                </a>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-neutral-700 text-[10px] font-normal font-['Poppins'] whitespace-nowrap">${item.type.replace(/_/g, '-').split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join('-')}</span>
                </div>
                <div class="flex gap-2 items-center">
                    <img class="object-cover rounded-full size-7" src="${item.companyLogo || item.imageUrl}" alt="${item.company}" loading="lazy" />
                    <span class="text-zinc-800 text-xs font-normal font-['Poppins'] truncate">${item.company}</span>
                </div>
            </div>
        `;
    });

    // Fill remaining slots with placeholders if less than 3 items
    for (let i = lastSeen.length; i < 3; i++) {
        lastSeenContainer.innerHTML += `
            <div class="flex flex-col flex-shrink-0 gap-3 w-80">
                <div class="block group">
                    <div class="flex flex-col gap-2">
                        <div class="relative overflow-hidden rounded-[20px]">
                            <img class="object-cover w-full h-36 bg-gray-200" src="https://placehold.co/320x144/e5e7eb/9ca3af?text=No+Recent+Views" alt="No recent views" loading="lazy" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <h3 class="text-zinc-400 text-base font-medium font-['Poppins']">No recent views</h3>
                            <p class="text-zinc-400 text-xs font-normal font-['Poppins'] opacity-75">Browse internships to see them here</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-100 rounded-full text-neutral-400 text-[10px] font-normal font-['Poppins']">-</span>
                </div>
                <div class="flex gap-2 items-center">
                    <img class="object-cover bg-gray-200 rounded-full size-7" src="https://placehold.co/28x28/e5e7eb/9ca3af" alt="" loading="lazy" />
                    <span class="text-zinc-400 text-xs font-normal font-['Poppins']">-</span>
                </div>
            </div>
        `;
    }
}

// Function to initialize file upload components
function initFileUpload() {
    // Wait for DOM to be fully loaded and Preline to initialize
    setTimeout(() => {
        console.log('Initializing file upload components...');

        // Check if HSFileUpload exists
        if (window.HSFileUpload) {
            console.log('HSFileUpload found, initializing...');
            window.HSFileUpload.autoInit();
        } else if (window.HSStaticMethods && window.HSStaticMethods.autoInit) {
            console.log('Using HSStaticMethods autoInit...');
            window.HSStaticMethods.autoInit();
        } else {
            console.log('Preline not fully loaded yet, retrying...');
            // Try again after a longer delay
            setTimeout(() => {
                if (window.HSFileUpload) {
                    window.HSFileUpload.autoInit();
                } else if (window.HSStaticMethods) {
                    window.HSStaticMethods.autoInit();
                }
            }, 500);
        }

        // Manual initialization for existing elements
        const fileUploadElements = document.querySelectorAll('[data-hs-file-upload]');
        console.log(`Found ${fileUploadElements.length} file upload elements`);

        fileUploadElements.forEach((element, index) => {
            console.log(`Processing element ${index + 1}`);

            // Add click event listener to trigger area
            const triggerArea = element.querySelector('[data-hs-file-upload-trigger]');
            if (triggerArea) {
                console.log('Adding click listener to trigger area');
                triggerArea.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Create a file input if it doesn't exist
                    let fileInput = element.querySelector('input[type="file"]');
                    if (!fileInput) {
                        fileInput = document.createElement('input');
                        fileInput.type = 'file';
                        fileInput.style.display = 'none';
                        fileInput.accept = '.pdf,.doc,.docx,.txt'; // Adjust as needed
                        element.appendChild(fileInput);
                    }

                    // Trigger file selection
                    fileInput.click();

                    // Handle file selection
                    fileInput.onchange = function(e) {
                        const files = e.target.files;
                        if (files.length > 0) {
                            console.log('File selected:', files[0].name);
                            // You can add file preview logic here
                        }
                    };
                });
            }
        });
    }, 200);
}
