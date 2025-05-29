@props([
    'name' => 'John Doe',
    'profileImage' => 'https://placehold.co/50x50',
    ])

<div id="topbar"
    class="fixed top-0 right-0 left-0 z-50 py-4 transition-shadow duration-300 bg-dashboard sm:py-5 md:py-6 lg:py-8 xl:py-6">
    <div class="ml-14 mr-4 sm:ml-16 sm:mr-5 md:ml-20 md:mr-6 lg:ml-24 lg:mr-8 xl:ml-[75px] xl:mr-8 2xl:ml-[308px] 2xl:mr-[150px]">
        <div class="flex gap-2 justify-between items-center w-full sm:gap-3 md:gap-4"> <!-- Search Bar -->
            <div
                class="flex-1 min-w-0 max-w-sm px-3 py-2 rounded-full border border-stone-300 sm:max-w-md sm:px-3 sm:py-2 md:max-w-lg md:px-4 md:py-2 lg:max-w-xl lg:px-4 lg:py-2.5 xl:max-w-2xl xl:px-5 xl:py-2.5 2xl:max-w-[63rem] relative">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/iconamoon_search-light.png"
                    class="absolute left-2 top-1/2 w-4 h-4 transform -translate-y-1/2 sm:w-5 sm:h-5 md:w-6 md:h-6 xl:w-4 xl:h-4"
                    alt="">
                <input type="text" placeholder="Search your internship..."
                    class="w-full bg-transparent outline-none placeholder-neutral-500 text-main text-xs font-normal font-['Poppins'] sm:text-sm md:text-base xl:text-base pl-6 sm:pl-7 md:pl-8 xl:pl-6">
            </div>

            <!-- Action Icons Container -->
            <div class="flex flex-shrink-0 gap-1 items-center sm:gap-2 md:gap-3 xl:gap-4">

                <!-- Notification Icon -->
                <div
                    class="flex justify-center items-center p-1.5 w-8 h-8 rounded-2xl border border-stone-300 sm:w-9 sm:h-9 sm:p-2 sm:rounded-3xl md:w-10 md:h-10 md:p-2.5 xl:w-12 xl:h-12 xl:p-3 xl:rounded-3xl">
                    <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/ion_notifcations.png"
                        class="w-3 h-3 sm:w-4 sm:h-4 md:w-4 md:h-4 xl:w-5 xl:h-5">
                    </img>
                </div>

                <!-- Divider -->
                <div class="mx-1 w-0 h-6 border-l-2 border-stone-300 sm:h-7 sm:mx-1.5 md:h-8 md:mx-2 xl:h-12 xl:mx-3">
                </div>

                <!-- Profile Section -->
                <a href="{{ route('profile') }}" class="flex flex-shrink-0 gap-1 items-center sm:gap-1.5 md:gap-2 xl:gap-2.5">
                    <img class="w-8 h-8 rounded-full shadow-[inset_2px_2px_10px_1px_rgba(0,0,0,0.25)] sm:w-9 sm:h-9 md:w-10 md:h-10 xl:w-12 xl:h-12 flex-shrink-0"
                        src="{{ $profileImage }}" />
                    <div
                        class="hidden text-black text-xs font-medium font-['Poppins'] md:block md:text-sm lg:text-base xl:text-base whitespace-nowrap">
                        {{ $name }}
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>
