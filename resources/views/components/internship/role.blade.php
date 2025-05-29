@props([
    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65'
])

<div class="inline-flex gap-2.5 justify-start items-center size-">
    <div class="w-[503px] h-12 inline-flex flex-col justify-start items-start">
        <div class="w-96 justify-start text-main text-xl font-semibold font-['Poppins'] tracking-wide">{{ $title }}</div>
        <div class="inline-flex gap-0.5 justify-start items-center size-">
            <div class="justify-center text-main text-xs font-normal font-['Poppins']">{{ $company }}</div>
        </div>
    </div>
    <img class="rounded-full size-16" src="{{ $profile }}" />
</div>
