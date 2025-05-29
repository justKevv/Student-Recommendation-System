@props([
    'title' => 'Kickstart Your Career with',
    'subtitle' => 'Top Internship Opportunities',
    'buttonText' => 'Apply Now',
    'badgeText' => 'FIND INTERNSHIP',
    'imageUrl' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashbard_assest_37641278.png'
])

<div class="w-full max-w-none lg:max-w-[800px] xl:max-w-[900px] 2xl:max-w-[1000px] h-64 relative">
    <!-- Background -->
    <div class="w-full h-64 bg-dashboard2 rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]"></div>

    <!-- Hero Image -->
    <img class="w-[711px] h-64 right-0 top-0 absolute object-cover rounded-r-[30px]"
         src="{{ $imageUrl }}"
         alt="Dashboard hero image" />

    <!-- Content -->
    <div class="absolute left-[27px] top-[23px] space-y-3">
        <!-- Badge -->
        <div class="text-main text-xs font-medium font-['Poppins']">
            {{ $badgeText }}
        </div>

        <!-- Title -->
        <div class="space-y-2">
            <h1 class="text-main text-3xl font-semibold font-['Poppins'] leading-tight">
                {{ $title }}
            </h1>
            <h2 class="text-main text-3xl font-semibold font-['Poppins'] leading-tight">
                {{ $subtitle }}
            </h2>
        </div>
    </div>

    <!-- CTA Button -->
    <div class="absolute left-[27px] top-[175px]">
        <button class="w-36 h-12 bg-main rounded-[30px] flex items-center justify-center gap-3 px-4 transition-all duration-300 hover:shadow-lg group">
            <span class="text-white text-xs font-medium font-['Poppins']">{{ $buttonText }}</span>
            <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform duration-300 group-hover:translate-x-1">
                <path d="M16 0C12.8355 0 9.74207 0.938384 7.11088 2.69649C4.4797 4.45459 2.42894 6.95345 1.21793 9.87706C0.00693244 12.8007 -0.309921 16.0177 0.307443 19.1214C0.924806 22.2251 2.44866 25.0761 4.6863 27.3137C6.92394 29.5513 9.77486 31.0752 12.8786 31.6926C15.9823 32.3099 19.1993 31.9931 22.1229 30.7821C25.0466 29.5711 27.5454 27.5203 29.3035 24.8891C31.0616 22.2579 32 19.1645 32 16C31.9955 11.7579 30.3084 7.69085 27.3088 4.69124C24.3092 1.69163 20.2421 0.00447972 16 0ZM20.5631 16.8708L14.4092 23.0246C14.2949 23.139 14.1591 23.2297 14.0097 23.2916C13.8603 23.3534 13.7002 23.3853 13.5385 23.3853C13.3767 23.3853 13.2166 23.3534 13.0672 23.2916C12.9178 23.2297 12.782 23.139 12.6677 23.0246C12.5533 22.9103 12.4626 22.7745 12.4008 22.6251C12.3389 22.4757 12.307 22.3156 12.307 22.1538C12.307 21.9921 12.3389 21.832 12.4008 21.6826C12.4626 21.5332 12.5533 21.3974 12.6677 21.2831L17.9523 16L12.6677 10.7169C12.4368 10.486 12.307 10.1728 12.307 9.84615C12.307 9.51955 12.4368 9.20632 12.6677 8.97538C12.8986 8.74444 13.2119 8.6147 13.5385 8.6147C13.8651 8.6147 14.1783 8.74444 14.4092 8.97538L20.5631 15.1292C20.6775 15.2435 20.7683 15.3793 20.8302 15.5287C20.8922 15.6781 20.924 15.8383 20.924 16C20.924 16.1617 20.8922 16.3219 20.8302 16.4713C20.7683 16.6207 20.6775 16.7565 20.5631 16.8708Z" fill="white" />
            </svg>
        </button>
    </div>
</div>
