@props([
    'is_active' => false,
    'href' => '#',
    'use_fill' => true,
    'not_fill' => '',
])
@if ($is_active)
    @if ($use_fill)
    <a href="{{ $href }}" class="self-stretch h-14 p-2 bg-main rounded-[29px] flex flex-col justify-center items-center gap-2.5">
        <div class="flex justify-center items-center">
            <svg width="33" height="32" viewBox="0 0 33 32" fill="#FEC01A" fill-rule="evenodd" clip-rule="evenodd" xmlns="http://www.w3.org/2000/svg">
                {{ $slot }}
            </svg>
        </div>
    </a>
    @else
    <a href="{{ $href }}" class="self-stretch h-14 p-2 bg-main rounded-[29px] flex flex-col justify-center items-center gap-2.5">
        <div class="flex justify-center items-center">
            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" stroke="#FEC01A" stroke-width="2" xmlns="http://www.w3.org/2000/svg">
                {{ $slot }}
            </svg>
        </div>
    </a>

    @endif
@else
    <a href="{{ $href }}" class="flex flex-col gap-2.5 justify-center items-center self-stretch p-2 h-14">
        <div class="flex justify-center items-center">
            <svg width="33" height="32" viewBox="0 0 33 32" stroke="#757575" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg">
                {{ $slot }}
            </svg>
        </div>
    </a>
@endif
