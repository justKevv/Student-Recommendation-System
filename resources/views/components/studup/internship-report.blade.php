@php
    // Gunakan Carbon untuk mendapatkan tanggal saat ini
    $now = \Carbon\Carbon::now();
    $currentMonth = $now->month;
    $currentYear = $now->year;
    $currentDay = $now->day;

    // Tanggal yang disorot dan dilingkari sesuai gambar terbaru (image_7685d4.png)
    $highlightedDates = [14, 15]; // Tanggal 14 dan 15 disorot kuning solid
    $circledDates = [16, 30];    // Tanggal 16 dan 30 dilingkari putih (outline)
@endphp

{{-- Pembungkus luar dengan lebar 650px dan shadow --}}
<div class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">

    {{-- Judul "Internship Report" --}}
    <h2 class="text-main text-2xl font-semibold font-['Poppins']">Internship Report</h2>
    <x-calender />
</div>