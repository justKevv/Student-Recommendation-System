@props([
    'name' => 'Yuma Akhunza',
    'position' => 'UI/UX Designer',
    'company' => 'Jasa Ayah Corp',
    'location' => 'Malang',
    'workType' => 'Hybrid',
    'coverImage' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/bg-profile_17281278.png',
    'avatarImage' => 'https://placehold.co/120x120'
])

<div class="w-[650px] h-80 relative">
    {{-- Background Card --}}
    <div class="w-full h-80 left-0 top-0 absolute bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]">
    </div>    {{-- Cover Image --}}
    <img class="w-[calc(100%-24px)] h-36 left-[12px] top-[12px] absolute rounded-t-[18px] rounded-b-[18px] object-cover"
         src="{{ $coverImage }}"
         alt="Profile cover image"
         loading="lazy" />{{-- Profile Avatar --}}
    <img class="size-28 left-1/2 transform -translate-x-1/2 top-[81px] absolute rounded-full shadow-[inset_2px_2px_10px_1px_rgba(0,0,0,0.25)]"
         src="{{ $avatarImage }}"
         alt="{{ $name }} profile picture"
         loading="lazy" />{{-- Profile Information Section --}}
    <div class="w-60 left-1/2 transform -translate-x-1/2 bottom-[33px] absolute inline-flex flex-col justify-start items-center gap-[5px]">
        {{-- User Name --}}
        <div class="self-stretch text-center justify-center text-main text-xl font-medium font-['Poppins']">
            {{ $name }}
        </div>

        {{-- Job Title & Company --}}
        <div class="self-stretch justify-center text-neutral-500 text-sm font-normal font-['Poppins']">
            {{ $position }} @ {{ $company }}
        </div>

        {{-- Location & Work Type --}}
        <div class="inline-flex gap-2.5 justify-start items-end">
            {{-- Location --}}
            <div class="justify-center text-pink-800 text-sm font-normal font-['Poppins']">
                {{ $location }}
            </div>

            {{-- Separator Line --}}
            <div class="flex items-center" aria-hidden="true">
                <svg width="3"
                     height="22"
                     viewBox="0 0 3 22"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 1L1.5 21"
                          stroke="#CACACA"
                          stroke-opacity="0.4"
                          stroke-width="1.5"
                          stroke-linecap="round" />
                </svg>
            </div>

            {{-- Work Type --}}
            <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">
                {{ $workType }}
            </div>
        </div>
    </div>
</div>
