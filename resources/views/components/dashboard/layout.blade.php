@props([
    'class' => '',
    'gap' => '60px',
])

<div class="flex items-start {{ $class }}" style="gap: {{ $gap }}">
    {{ $slot }}
</div>
