@props([
    'class' => ''
])

<div class="flex gap-[30px] items-start {{ $class }}">
    {{ $slot }}
</div>