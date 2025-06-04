@props([
    'location' => 'Default Location',
    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',
    'applied' => 0,
    'due' => '0 days',
    'type' => '3 Register | D-IV Information Technology', // Ini adalah prop untuk "Remote"
    'href' => '#'
])

<div class="w-[990px] h-[260px] px-5 py-5 bg-white rounded-[20px] inline-flex flex-col justify-start items-start gap-5">
    <x-internship.location location="{{ $location }}" />
    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />

    <a href="{{ $href }}" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg" >
      <span>{{ $type }}</span>
    </a>
</div>

