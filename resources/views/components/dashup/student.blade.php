@props([
    'title' => 'Student Internship',
    'students', // Wajib: Array objek pelajar
    'currentPage',
    'totalPages',
    'selectedEntriesPerPage',
])

<div class="mt-8 w380 h-1000 bg-white/80 rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.05)] p-6" 
style="height: 630px;">
    <div class="flex justify-between items-center mb-4">
        <h1 class="flex text-main text-3xl font-semibold font-['Poppins'] leading-tight">
            {{ $title }}
        </h1>

        <div class="flex-left max-w px-3 py-2 rounded-full border border-stone-300 sm:max-w-md sm:px-4 sm:py-2.5 md:max-w-lg md:px-5 xl:max-w-[220px] xl:px-5 xl:py-2.5 relative">
            <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/iconamoon_search-light.png"
                class="absolute w-4 h-4 transform -translate-y-1/2 left-2 top-1/2 sm:w-5 sm:h-5 md:w-6 md:h-6 xl:w-4 xl:h-4"
                alt="">
            <input type="text" placeholder="Search by name..."
                class="w-full bg-transparent outline-none placeholder-neutral-500 text-main text-xs font-normal font-['Poppins'] sm:text-sm md:text-base xl:text-base pl-6 sm:pl-7 md:pl-8 xl:pl-6">
        </div>
    </div>

    {{-- Tabel daftar pelajar akan dirender di sini --}}
    <x-dashup.student-list
        :students="$students"
        :currentPage="$currentPage"
        :totalPages="$totalPages"
        :selectedEntriesPerPage="$selectedEntriesPerPage"
    />
</div>