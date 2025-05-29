@props([
    'profile' => 'https://placehold.co/55x55',
    'name' => 'Yuma Akhunza',
    'role' => 'UI/UX Designer',
    'completed' => 4,
    'href' => '#',
])

<div
    class="self-stretch p-2.5 rounded-[40px] outline outline-offset-[-1px] outline-stone-300 inline-flex justify-between items-center">
    <div class="flex gap-4 justify-center items-center size-">
        <img class="rounded-full size-14" src="{{ $profile }}" />
        <div class="inline-flex flex-col gap-0.5 justify-start items-start w-32">
            <div class="self-stretch justify-center text-main text-base font-medium font-['Poppins']">{{ $name }}</div>
            <div class="self-stretch justify-center text-neutral-500 text-xs font-normal font-['Poppins']">{{ $role }}</div>
        </div>
    </div>

    <div class="flex gap-6 items-center">
        <div class="flex gap-2 items-center">
            <div class="text-base text-gray-600 min-w-fit">
                Completed: {{ $completed }}/7
            </div>
            <div class="size- flex justify-center items-center gap-[3px]">
                @for ($i = 0; $i < 7; $i++)
                    <div class="w-2 h-5 bg-{{ $i < $completed ? 'redgoon' : 'stone-300' }} rounded-[3px]"></div>
                @endfor
            </div>
        </div>
        <a href="{{ $href }}" class="mr-4 w-24 h-9 px-6 py-[5px] bg-main rounded-[20px] flex justify-center items-center gap-2.5">
            <div class="text-center justify-start text-white text-base font-normal font-['Poppins']">Detail</div>
        </a>
    </div>
</div>
