@props([
    'location' => 'Default Location',
    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',
    'applied' => 0,
    'due' => '0 days',
    'type' => 'Remote'
])

<div class="w-[630px] px-5 py-5 bg-white rounded-[20px] flex flex-col justify-start items-start gap-2.5 relative">
    <div class="w-full flex justify-between items-center">
        <x-internship.location location="{{ $location }}" />
        <x-interadm.edit-delete />
    </div>

    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />
    <x-internship.type type="{{ $type }}" />
</div>