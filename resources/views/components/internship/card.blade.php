@props([
    'location' => 'Default Location',

    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',

    'applied' => 0,
    'due' => '0 days',

    'type' => 'Remote',

    'href' => '#',

    'is_admin' => false,
    'internship_id' => null

])

<div class="w-[630px] px-5 py-5 bg-white rounded-[20px] inline-flex flex-col justify-start items-start gap-2.5 relative cursor-pointer transition-all duration-300 ease-in-out hover:shadow-lg hover:shadow-neutral-200 {{ $is_admin ? "" : "transition-all duration-300 ease-in-out hover:shadow-lg hover:shadow-neutral-200 hover:-translate-y-[2px]" }}">
    <a href="{{ $href }}" class="absolute inset-0 z-10"></a>
    <div class="flex relative z-20 justify-between items-center w-full">
        <x-internship.location location="{{ $location }}" />
        @if ($is_admin)
            <x-edit-delete :internship_id="$internship_id" />
        @endif
    </div>
    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />
    <x-internship.type type="{{ $type }}" />
</div>
