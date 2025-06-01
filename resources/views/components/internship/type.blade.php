@props([
    'type' => 'Remote'
])

<div class="inline-flex gap-2.5 justify-center items-center size-">
    <div
        class="w-16 h-6 px-7 py-3.5 rounded-[50px] outline  outline-offset-[-1px] outline-stone-300 flex justify-center items-center gap-2.5">
        <div class="justify-start text-neutral-700 text-xs font-normal font-['Poppins']">{{ $type }}</div>
    </div>
</div>
