@props([
    'location' => 'Default Location',

    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',

    'applied' => 0,
    'due' => '0 days',

    'type' => 'Remote',

    'href' => '#'

])

<a href="{{ $href }}" class="w-[630px] px-5 py-5 bg-white rounded-[20px] inline-flex flex-col justify-start items-start gap-2.5">
    <x-internship.location location="{{ $location }}" />
    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />
    <x-internship.type type="{{ $type }}" />
</a>
