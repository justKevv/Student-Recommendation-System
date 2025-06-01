@props([
    'supervisorName' => 'Adevian Fairuz Pratama',
    'supervisorRole' => 'Supervisor',
    'supervisorImage' => 'https://placehold.co/50x50' // Masih menggunakan placeholder, sesuaikan nanti
])

<div class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <div class="flex items-center gap-4">
        <img src="{{ $supervisorImage }}" alt="{{ $supervisorName }}'s profile picture" class="size-14 rounded-full object-cover" loading="lazy">
        <div>
            <p class="text-main text-xl font-medium font-['Poppins']">{{ $supervisorName }}</p>
            <p class="text-neutral-500 text-sm font-normal font-['Poppins']">{{ $supervisorRole }}</p>
        </div>
    </div>

    {{-- Bagian input pesan yang disesuaikan --}}
    <div class="w-full h-[px] bg-neutral-100 rounded-[15px] px-5 py-4">
        {{-- <span class="text-neutral-500 text-base font-normal font-['Poppins']">Message</span>
        <textarea class="w-full h-24 p-2 resize-none outline-none text-main text-base font-normal font-['Poppins']" placeholder="Message"></textarea> --}}
        <textarea class="w-full resize-none outline-none text-main text-base font-normal font-['Poppins']" placeholder="Message"></textarea>
    </div>
</div>