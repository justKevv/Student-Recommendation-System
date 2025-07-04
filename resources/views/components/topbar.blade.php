@props([
    'name' => 'John Doe',
    'profileImage' => 'https://placehold.co/50x50',
    'searchBar' => true,
])


<div id="topbar"
    class="fixed top-0 right-0 left-0 z-50 py-4 transition-shadow duration-300 bg-dashboard sm:py-5 md:py-6 lg:py-8 xl:py-6">
    <div class="ml-14 mr-4 sm:ml-16 sm:mr-5 md:ml-20 md:mr-6 lg:ml-24 lg:mr-8 xl:ml-[75px] xl:mr-8 2xl:ml-[308px] 2xl:mr-[150px]">
        <div class="flex gap-2 justify-between items-center w-full sm:gap-3 md:gap-4">
            @if ($searchBar)
                <form action="{{ route('internship') }}" method="GET"
                    class="flex-1 min-w-0 max-w-sm px-4 py-2 rounded-full border border-stone-300 sm:max-w-md sm:px-3 sm:py-2 md:max-w-lg md:px-4 md:py-2 lg:max-w-xl lg:px-4 lg:py-2.5 xl:max-w-2xl xl:px-5 xl:py-2.5 2xl:max-w-[63rem] relative">
                    <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/iconamoon_search-light.png"
                        class="absolute left-2 top-1/2 w-4 h-4 transform -translate-y-1/2 sm:w-5 sm:h-5 md:w-6 md:h-6 xl:w-4 xl:h-4 pointer-events-none"
                        alt="">
                    <input type="text" name="search" placeholder="Search by title, description, requirements, or company name..." value="{{ request('search') }}"
                            class="w-full bg-transparent outline-none placeholder-neutral-500 text-main text-xs font-normal font-['Poppins'] sm:text-sm md:text-base xl:text-base pl-6 sm:pl-7 md:pl-8 xl:pl-6"
                            onkeypress="if(event.key === 'Enter') { this.form.submit(); }">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 opacity-0 pointer-events-none"></button>
                </form>
              @else
                <div class="flex-1 min-w-0 max-w-sm px-3 py-2 rounded-full sm:max-w-md sm:px-3 sm:py-2 md:max-w-lg md:px-4 md:py-2 lg:max-w-xl lg:px-4 lg:py-2.5 xl:max-w-2xl xl:px-5 xl:py-2.5 2xl:max-w-[63rem] relative">
                </div>
            @endif

            <div class="flex flex-shrink-0 gap-1 items-center sm:gap-2 md:gap-3 xl:gap-4">

                <div class="relative">
                    <div id="notification-icon"
                        class="flex justify-center items-center p-1.5 w-8 h-8 rounded-2xl border cursor-pointer border-stone-300 sm:w-9 sm:h-9 sm:p-2 sm:rounded-3xl md:w-10 md:h-10 md:p-2.5 xl:w-12 xl:h-12 xl:p-3 xl:rounded-3xl"
                        onclick="toggleNotification()">
                        <img id="notification-img" src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/ion_notifcations.png"
                            class="w-3 h-3 sm:w-4 sm:h-4 md:w-4 md:h-4 xl:w-5 xl:h-5" alt="Notifications">
                    </div>

                    {{-- Memanggil komponen notifikasi terpisah di sini --}}
                    <x-topbar-notif />
                </div>

                <div class="mx-1 w-0 h-6 border-l-2 border-stone-300 sm:h-7 sm:mx-1.5 md:h-8 md:mx-2 xl:h-12 xl:mx-3">
                </div>

                <a href="{{ route('profile') }}" class="flex flex-shrink-0 gap-1 items-center sm:gap-1.5 md:gap-2 xl:gap-2.5">
                    <img id="profile-topbar" class="w-8 h-8 rounded-full shadow-[inset_2px_2px_10px_1px_rgba(0,0,0,0.25)] sm:w-9 sm:h-9 md:w-10 md:h-10 xl:w-12 xl:h-12 flex-shrink-0"
                        src="{{ $profileImage }}" alt="Profile">
                    <div
                        class="hidden text-black text-xs font-medium font-['Poppins'] md:block md:text-sm lg:text-base xl:text-base whitespace-nowrap">
                        {{ $name }}
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk mengelola tampilan notifikasi --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notificationIcon = document.getElementById('notification-icon');
        const notificationsPopover = document.getElementById('notifications-popover'); // Pastikan ID ini sesuai dengan komponen topbar-notif

        if (notificationIcon && notificationsPopover) {
            notificationIcon.addEventListener('click', function (event) {
                event.stopPropagation(); // Mencegah klik menyebar ke dokumen dan langsung menutup popover
                notificationsPopover.classList.toggle('hidden');
            });

            // Tutup popover jika diklik di luar area ikon dan popover itu sendiri
            document.addEventListener('click', function (event) {
                if (!notificationIcon.contains(event.target) && !notificationsPopover.contains(event.target)) {
                    notificationsPopover.classList.add('hidden');
                }
            });
        }
    });

    function toggleNotification() {
    const notificationIcon = document.getElementById('notification-icon');
    const notificationImg = document.getElementById('notification-img');

    // Toggle active state
    if (notificationIcon.classList.contains('bg-main')) {
        // Remove active state
        notificationIcon.classList.remove('bg-main', 'border-main');
        notificationIcon.classList.add('border-stone-300');
        // Reset to original image (you can change this URL to the inactive version)
        notificationImg.src = 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/ion_notifcations.png';
    } else {
        // Add active state
        notificationIcon.classList.add('bg-main', 'border-main');
        notificationIcon.classList.remove('border-stone-300');
        // Change to active/filled image (you can change this URL to the active version)
        notificationImg.src = 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/ion_notifcations_on.png';
    }
}
</script>
