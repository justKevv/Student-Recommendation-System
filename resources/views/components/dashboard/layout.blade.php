@props([
    'class' => ''
])

<div class="flex gap-[60px] items-start {{ $class }}">
    {{ $slot }}
</div>
