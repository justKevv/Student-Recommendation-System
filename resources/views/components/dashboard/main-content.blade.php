@props([
    'class' => ''
])

<div class="flex-1 space-y-6 {{ $class }}">
    {{ $slot }}
</div>
