@props([
    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65'
])


<div class="inline-flex justify-between items-center self-stretch">
    <div class="inline-flex flex-col justify-start items-start w-96">
        <div class="self-stretch justify-start text-zinc-800 text-xl font-semibold font-['Poppins'] tracking-wide">{{ $title }}</div>

        <div class="self-stretch justify-center text-main text-xs font-normal font-['Poppins']">{{ $company }}</div>
    </div>
    <img class="rounded-full size-16" src="{{ $profile }}" />
</div>
