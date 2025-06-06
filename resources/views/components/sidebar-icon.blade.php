@props([
    'is_active' => false,
    'href' => '#',
    'use_fill' => true,
    'use_stroke' => true,
])

@php
    $linkClass = $is_active
        ? 'self-stretch h-14 p-2 bg-main rounded-[29px] flex flex-col justify-center items-center gap-2.5'
        : 'flex flex-col gap-2.5 justify-center items-center self-stretch p-2 h-14';

    $svgAttributes = [];

    if ($is_active) {
        if ($use_fill) {
            $svgAttributes = [
                'fill' => '#FEC01A',
                'fill-rule' => 'evenodd',
                'clip-rule' => 'evenodd'
            ];
        } else {
            $svgAttributes = [
                'fill' => 'none',
                'stroke' => '#FEC01A',
                'stroke-width' => '2'
            ];
        }
    } else {
        if ($use_stroke) {
            $svgAttributes = [
                'stroke' => '#757575',
                'stroke-width' => '2',
                'fill' => 'none'
            ];
        } else {
            $svgAttributes = [
                'fill' => '#757575',
                'fill-rule' => 'evenodd',
                'clip-rule' => 'evenodd'
            ];
        }
    }
@endphp

<a href="{{ $href }}" class="{{ $linkClass }}">
    <div class="flex justify-center items-center">
        <svg width="33" height="32" viewBox="0 0 33 32" xmlns="http://www.w3.org/2000/svg"
            @foreach($svgAttributes as $attr => $value)
                {{ $attr }}="{{ $value }}"
            @endforeach
        >
            {{ $slot }}
        </svg>
    </div>
</a>
