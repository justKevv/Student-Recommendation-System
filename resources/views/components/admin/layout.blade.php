@props([
    'class' => '',
    'gap' => '40px',
])

<div class="flex items-start {{ $class }}" style="gap: {{ $gap }}">
    {{ $slot }}
</div>
