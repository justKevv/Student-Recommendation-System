@props([
    'class' => ''
])

<div class="flex space-y-6 {{ $class }}">
    {{ $slot }}
</div>
