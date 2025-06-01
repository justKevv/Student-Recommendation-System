{{-- resources/views/components/interman/apply.blade.php --}}
<div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6"> {{-- Menggunakan justify-between dan items-center untuk menata ikon dan tombol share --}}
        {{-- Grup Tombol Like/Save dan Calendar --}}
        <div class="flex space-x-4">
            <button class="flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </button>
            <button class="flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </button>
        </div>
        {{-- Tombol Share --}}
        <button class="flex items-center px-4 py-2 rounded-full text-gray-600 hover:text-gray-900 border border-gray-300 bg-white shadow-sm font-semibold text-sm">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.882 13.118 9 12.831 9 12c0-.721-.198-1.396-.546-1.944M9 12c0 2.485 5.333 4 7 4h2.5M9 12c0-2.485 5.333-4 7-4h2.5m-15 4h10M6 12a2 2 0 11-4 0 2 2 0 014 0zM12 4a2 2 0 11-4 0 2 2 0 014 0zM18 20a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span>Share</span>
        </button>
    </div>

    <button class="w-full bg-gray-800 text-white py-3 rounded-full font-semibold hover:bg-gray-900 transition duration-300 text-lg ">Apply</button> {{-- Mengubah warna tombol dan membuatnya rounded-full --}}

    <div class="border-b pb-5 border-gray-200">
    </div>
    <div class="grid grid-cols-2 gap-4 mt-6"> {{-- Menggunakan grid untuk menata statistik --}}
        <div class="flex items-center p-2 rounded-lg"> {{-- Menghilangkan latar belakang kotak statistik --}}
            <svg class="w-6 h-6 mr-3 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2m2-2a4 4 0 108 0H4zm16 0a4 4 0 10-8 0h8z"></path></svg>
            <div>
                <div class="text-gray-700 text-sm">Applied</div>
                <div class="text-gray-900 font-semibold text-lg">21</div>
            </div>
        </div>
    </div>
</div>