@props([
    'skills' => ['Java', 'HTML', 'CSS', 'JavaScript', 'Leadership', 'REST', 'IoT', 'AI']
])

<div class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <div class="flex justify-between items-center">
        <h2 class="text-main text-2xl font-semibold font-['Poppins']">Skill</h2>
        <div class="flex space-x-3">
            <x-edit-icon></x-edit-icon>
            <x-add-icon></x-add-icon>
        </div>
    </div>

    <div class="flex flex-wrap gap-2">
        @foreach ($skills as $skill)
            <span class="px-4 py-2 bg-skillbg outline-2 outline-skilloutline text-main text-sm font-medium font-['Poppins'] rounded-[15px]">
                {{ $skill }}
            </span>
        @endforeach
    </div>
</div>
