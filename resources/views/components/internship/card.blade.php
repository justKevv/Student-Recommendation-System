@props([
    'location' => 'Default Location',

    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',

    'applied' => 0,
    'due' => '0 days',

    'type' => 'Remote'
])

<div class="size- px-6 py-5 bg-white rounded-[30px] inline-flex flex-col justify-start items-start gap-2.5">
    <x-internship.location location="{{ $location }}" />
    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />
    <x-internship.type type="{{ $type }}" />
</div>
