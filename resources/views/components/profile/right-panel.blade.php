@props(
    [
        'title' => 'Default Title',
        'editicon' => true,
        'addicon' => true,
    ]
)
<div class="w-full min-w-[780px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">{{ $title }}</h2>
        <div class="flex space-x-3">
            @if($editicon)
                <x-edit-icon></x-edit-icon>
            @endif
            @if($addicon)
                <x-add-icon></x-add-icon>
            @endif
        </div>
    </div>
    {{ $slot }}
</div>
