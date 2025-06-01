{{-- resources/views/components/interman/internship.blade.php --}}
<div class="overflow-hidden relative p-0 bg-white rounded-xl">
    {{-- Strip merah di sisi kiri --}}
    <div class="absolute inset-y-0 left-0 w-2 bg-redgoon"></div>

    {{-- Konten utama kartu --}}
    <div class="relative p-6 pb-8 ml-2"> {{-- ml-2 untuk memberi ruang dari strip merah, relative untuk posisi days --}}
        {{-- Pembungkus untuk logo dan judul --}}
        <div class="flex flex-col items-start space-y-7"> {{-- Menggunakan flex-col untuk menumpuk elemen secara vertikal --}}
            <img src="https://placehold.co/80x80/E0E7FF/4F46E5?text=JA" alt="Jasa Ayah Corp Logo" class="w-24 h-24 rounded-full">
            <h1 class="text-2xl font-semibold leading-tight text-gray-900">UI/UX Design Internship</h1>
        </div>

        {{-- Detail informasi (perusahaan, lokasi, update) --}}
        <div class="mt-4"> {{-- Margin top untuk memisahkan dari judul --}}
            <div class="flex items-center mt-1 text-base text-gray-600">
                <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H4m0 0h-2M4 7h4m-4 0h2M12 7h4m-4 0h2"></path></svg>
                <p>Jasa Ayah Corp</p>
            </div>
            <div class="flex items-center mt-1 text-base text-gray-600">
                <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <p>Malang</p>
            </div>
            <div class="flex items-center mt-1 text-sm text-gray-500">
                <svg class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <p>Update On: May 15, 2025</p>
            </div>
        </div>

        {{-- Komponen "Days Left" --}}
        <div class="absolute top-4 right-4">
            <x-internship-details.days />
        </div>
    </div>
</div>
