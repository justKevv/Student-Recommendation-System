{{-- resources/views/components/compup/company.blade.php --}}
@props([
    'jobListings', // Prop ini diharapkan berisi array data job listings
])

<div class="h-64 relative min-h-screen">
    <div class="flex items-center space-x-4 mb-6">
        {{-- Tombol Sort by --}}
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 rounded-[30PX] shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            Sort by
            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        {{-- Tombol Location --}}
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 rounded-[30PX] shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Location
            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        {{-- Tombol Company --}}
        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 rounded-[30PX] shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Company
            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    {{-- Grid untuk menampilkan kartu perusahaan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($jobListings as $job)
            {{-- Memanggil komponen x-compup.company-card untuk setiap perusahaan --}}
            <x-compup.company-card
                :city="$job['city']"
                :company-name="$job['company_name']"
                :applied-count="$job['applied_count']"
                :logo-url="$job['logo_url']"
                :logo-bg-color="$job['logo_bg_color']"
            />
        @endforeach
    </div>
</div>

{{-- Memanggil komponen modal detail perusahaan --}}
<x-compup.company-detail-modal />

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companyCards = document.querySelectorAll('.company-card');
        const companyDetailModal = document.getElementById('company-detail-modal');
        const closeCompanyModalButton = document.getElementById('close-company-modal');
        const modalCompanyLogo = document.getElementById('modal-company-logo');
        const modalCompanyLogoWrapper = document.getElementById('modal-company-logo-wrapper');
        const modalCompanyCity = document.getElementById('modal-company-city');
        const modalCompanyName = document.getElementById('modal-company-name');
        const modalJobListings = document.getElementById('modal-job-listings');

        // Dummy data for job listings within the modal
        const companyJobDetails = {
            "PT Bamboo": [
                {
                    title: "UI/UX Designer Internship",
                    profileImage: "https://placehold.co/50x50",
                    message: "Yuma Akhunza",
                    role: "UI/UX Designer",
                    completed: "4/7"
                },
                {
                    title: "Frontend Developer Internship",
                    profileImage: "https://placehold.co/50x50",
                    message: "Yuma Akhunza",
                    role: "Frontend Developer",
                    completed: "4/7"
                }
            ],
            "PT Space": [
                {
                    title: "Backend Developer Internship",
                    profileImage: "https://placehold.co/50x50",
                    message: "Jane Doe",
                    role: "Backend Developer",
                    completed: "5/8"
                }
            ],
            "Hartono Group": [
                {
                    title: "Marketing Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Alice Smith",
                    role: "Marketing Specialist",
                    completed: "2/5"
                }
            ],
            "Salim Group": [
                {
                    title: "Finance Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Bob Johnson",
                    role: "Financial Analyst",
                    completed: "6/10"
                }
            ],
            "PT Indofood": [
                {
                    title: "Product Management Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Charlie Brown",
                    role: "Product Manager",
                    completed: "3/7"
                }
            ],
            "Go Group": [
                {
                    title: "Data Analyst Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Diana Prince",
                    role: "Data Analyst",
                    completed: "7/7"
                }
            ],
            "PT Cosmos": [
                {
                    title: "Graphic Designer Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Eve Adams",
                    role: "Graphic Designer",
                    completed: "1/4"
                }
            ],
            "PT Aloe": [
                {
                    title: "HR Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Frank White",
                    role: "HR Specialist",
                    completed: "4/6"
                }
            ],
            "PT Alam": [
                {
                    title: "Legal Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Grace Black",
                    role: "Legal Assistant",
                    completed: "5/5"
                }
            ],
            "Hasta Group": [
                {
                    title: "Operations Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Harry Green",
                    role: "Operations Coordinator",
                    completed: "2/3"
                }
            ],
            "Ogram Group": [
                {
                    title: "Content Writer Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Ivy Blue",
                    role: "Content Creator",
                    completed: "3/5"
                }
            ],
            "KG Group": [
                {
                    title: "Video Editor Intern",
                    profileImage: "https://placehold.co/50x50",
                    message: "Jack Red",
                    role: "Video Editor",
                    completed: "4/4"
                }
            ]
        };


        companyCards.forEach(card => {
            card.addEventListener('click', function () {
                const city = this.dataset.city;
                const companyName = this.dataset.companyName;
                const logoUrl = this.dataset.logoUrl;
                const logoBgColor = this.dataset.logoBgColor;

                // Update konten modal
                modalCompanyLogo.src = logoUrl;
                modalCompanyCity.textContent = city;
                modalCompanyName.textContent = companyName;
                modalCompanyLogoWrapper.className = `flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center mr-3 ${logoBgColor}`;


                // Hapus daftar lowongan sebelumnya
                modalJobListings.innerHTML = '';

                // Isi daftar lowongan berdasarkan nama perusahaan
                const jobs = companyJobDetails[companyName] || [];
                jobs.forEach(job => {
                    const completedParts = parseInt(job.completed.split('/')[0]);
                    const totalParts = parseInt(job.completed.split('/')[1]);

                    let progressBarHtml = '';
                    for (let i = 0; i < totalParts; i++) {
                        const barColorClass = i < completedParts ? 'bg-red-500' : 'bg-gray-300';
                        progressBarHtml += `<div class="w-2 h-4 rounded-full ${barColorClass} mx-0.5"></div>`;
                    }

                    const jobHtml = `
                        <div class="job-listing-container mb-4">
                            <h4 class="text-base font-semibold text-gray-800 mb-2">${job.title}</h4>
                            <div class="bg-white rounded-[10px] p-3 flex items-center shadow-sm border border-gray-200">
                                <img class="w-10 h-10 rounded-full flex-shrink-0" src="${job.profileImage}" alt="Profil">
                                <div class="flex-grow ml-3">
                                    <p class="text-black text-sm font-medium font-['Poppins'] leading-snug">
                                        ${job.message}
                                    </p>
                                    <p class="text-neutral-500 text-xs font-normal font-['Poppins'] leading-tight mt-1">
                                        ${job.role}
                                    </p>
                                </div>
                                <div class="ml-auto flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sm font-medium text-gray-700 whitespace-nowrap">Completed: ${job.completed}</p>
                                        <div class="flex items-center">
                                            ${progressBarHtml}
                                        </div>
                                    </div>
                                    <button class="bg-main text-white text-l px-8 py-2 rounded-full hover:bg-gray-700 transition-colors duration-200">Detail</button>
                                </div>
                            </div>
                        </div>
                    `;
                    modalJobListings.insertAdjacentHTML('beforeend', jobHtml);
                });

                companyDetailModal.classList.remove('hidden');
            });
        });

        closeCompanyModalButton.addEventListener('click', function () {
            companyDetailModal.classList.add('hidden');
        });

        companyDetailModal.addEventListener('click', function (event) {
            if (event.target === companyDetailModal) {
                companyDetailModal.classList.add('hidden');
            }
        });
    });
</script>