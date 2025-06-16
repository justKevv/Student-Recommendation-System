@props([
    'title' => 'Default Title',
    'editicon' => true,
    'addicon' => true,
    'userId' => null,
])
<div class="w-full min-w-[780px] bg-white rounded-[30px] shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">{{ $title }}</h2>
        <div class="flex space-x-3">
            @if ($editicon && auth()->user()->role != 'admin')
                <x-edit-icon modal_type="{{ Str::lower($title) }}" userId="{{ $userId }}"></x-edit-icon>
            @endif
            @if ($addicon && auth()->user()->role != 'admin')
                <x-add-icon modal_type="{{ Str::lower($title) }}" userId="{{ $userId }}"></x-add-icon>
            @endif
        </div>
    </div>
    {{ $slot }}
</div>
