@props([
    'title' => 'Continue Looking',
    'items' => []
])

<div class="w-full max-w-[1000px] min-w-[1000px] h-96 relative">
    <!-- Section Header -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-main text-xl font-medium font-['Poppins']">
            {{ $title }}
        </h2>

        <!-- Navigation Controls -->
        <div class="flex items-center gap-3.5">
            <button class="size-7 px-[5px] py-[5px] bg-main rounded-[20px] flex justify-center items-center gap-[5px] transition-all duration-300 hover:bg-main/80">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.36861 1.43148C9.53264 1.59557 9.62479 1.81809 9.62479 2.05011C9.62479 2.28212 9.53264 2.50464 9.36861 2.66873L5.03736 6.99998L9.36861 11.3312C9.52799 11.4963 9.61619 11.7173 9.6142 11.9467C9.6122 12.1761 9.52018 12.3956 9.35795 12.5578C9.19572 12.7201 8.97625 12.8121 8.74683 12.8141C8.51741 12.8161 8.29638 12.7279 8.13136 12.5685L3.18148 7.61861C3.01744 7.45452 2.92529 7.232 2.92529 6.99998C2.92529 6.76796 3.01744 6.54544 3.18148 6.38136L8.13136 1.43148C8.29544 1.26744 8.51796 1.17529 8.74998 1.17529C8.982 1.17529 9.20452 1.26744 9.36861 1.43148Z" fill="#F5F2ED" fill-opacity="0.7" />
                </svg>
            </button>
            <button class="size-7 px-[5px] py-[5px] rounded-[20px] outline outline-offset-[-1px] outline-stone-300 flex justify-center items-center gap-[5px] transition-all duration-300 hover:bg-gray-50">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.63139 1.43148C4.46736 1.59557 4.37521 1.81809 4.37521 2.05011C4.37521 2.28212 4.46736 2.50464 4.63139 2.66873L8.96264 6.99998L4.63139 11.3312C4.47201 11.4963 4.38381 11.7173 4.3858 11.9467C4.3878 12.1761 4.47982 12.3956 4.64205 12.5578C4.80428 12.7201 5.02375 12.8121 5.25317 12.8141C5.48259 12.8161 5.70362 12.7279 5.86864 12.5685L10.8185 7.61861C10.9826 7.45452 11.0747 7.232 11.0747 6.99998C11.0747 6.76796 10.9826 6.54544 10.8185 6.38136L5.86864 1.43148C5.70456 1.26744 5.48204 1.17529 5.25002 1.17529C5.018 1.17529 4.79548 1.26744 4.63139 1.43148Z" fill="#757575" />
                </svg>
            </button>
        </div>
    </div>    <!-- Content Container -->
    <div class="w-full h-80 bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
        <div class="flex h-full min-w-full gap-6 pb-4 overflow-x-auto no-scrollbar">
            {{ $slot }}
        </div>
    </div>
</div>
