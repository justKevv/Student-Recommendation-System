@props([
    'title' => '0',
    'student' => 'Active Internship',
])


<div class="flex-shrink-0 w-[368px] h-[260px] bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] px-4 py-4 flex flex-col items-center justify-center text-center">
    <div class="space-y-2">
        <div class="space-y-4">
            <h3 class="text-main text-6xl font-bold font-['Poppins'] leading-none">{{ $title }}</h3>
            <h3 class="text-main text-lg font-semibold font-['Poppins']">{{ $student }}</h3>
        </div>
</div>