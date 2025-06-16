@props([
    'imageUrl' => 'https://placehold.co/40x40',
    'title' => 'Default Title',
    'agency' => 'Default Agency',
    'timeLeft' => 'N/A',
    'quota' => 0,
    'href' => '#',
    'isUrgent' => false,
    'class' => ''
])

<a href="{{ $href }}" class="block w-full p-4 bg-recommend rounded-[20px] h-32 transition-all duration-300 hover:shadow-md hover:scale-[1.02] group {{ $class }}">
    <div class="flex items-start h-full gap-3">
        <img class="flex-shrink-0 transition-all duration-300 rounded-full size-10 group-hover:scale-110"
             src="{{ $imageUrl }}"
             alt="{{ $title }}"
             loading="lazy" />
        <div class="flex flex-col justify-between flex-1 h-full min-w-0 gap-1">
            <div class="space-y-1">
                <h3 class="text-main text-base font-medium font-['Poppins'] leading-tight line-clamp-1 group-hover:text-yellowgoon transition-colors duration-300">
                    {{ $title }}
                </h3>
                <p class="text-main text-xs font-normal font-['Poppins'] line-clamp-1 opacity-75">
                    {{ $agency }}
                </p>
                <span class="text-red-500 text-[10px] font-medium font-['Poppins'] {{ $isUrgent ? 'animate-pulse' : '' }}">
                    {{ $timeLeft }}
                </span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-main text-sm font-normal font-['Poppins']">
                    Applied: {{ $quota }}
                </span>
                @if($isUrgent)
                    <span class="px-2 py-1 bg-red-100 text-red-600 text-[8px] font-semibold rounded-full">
                        URGENT
                    </span>
                @endif
            </div>
        </div>
    </div>
</a>
