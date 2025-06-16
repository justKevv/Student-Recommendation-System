@props([
    'imageUrl' => 'https://placehold.co/40x40',
    'position' => 'Default Position',
    'companies' => 'Default Companies',
    'type' => 'Remote',
    'href' => '#',
    'tags' => ['Remote'],
    'companyLogo' => null,
    'class' => ''
])

<div class="flex flex-col gap-3 w-80 flex-shrink-0 {{ $class }}">
    <a href="{{ $href }}" class="block group">
        <div class="flex flex-col gap-2">
            <div class="relative overflow-hidden rounded-[20px]">
                <img class="object-cover w-full transition-transform duration-500 h-36 group-hover:scale-110"
                     src="{{ $imageUrl }}"
                     alt="{{ $position }}"
                     loading="lazy" />
                <div class="absolute inset-0 transition-all duration-300 bg-black/0 group-hover:bg-black/10"></div>
            </div>
            <div class="flex flex-col gap-1">
                <h3 class="text-main text-base font-medium font-['Poppins'] line-clamp-1 group-hover:text-yellowgoon transition-colors duration-300">
                    {{ $position }}
                </h3>
                <p class="text-zinc-600 text-xs font-normal font-['Poppins'] opacity-75">
                    {{ $companies }}
                </p>
            </div>
        </div>
    </a>

    <!-- Tags -->
    <div class="flex flex-wrap gap-2">
        <span class="px-3 py-1 bg-gray-200 rounded-full text-neutral-700 text-[10px] font-normal font-['Poppins'] whitespace-nowrap">
            {{ $type }}
        </span>
        {{-- @if(is_array($tags))
            @foreach($tags as $tag)
                <span class="px-3 py-1 bg-gray-200 rounded-full text-neutral-700 text-[10px] font-normal font-['Poppins'] whitespace-nowrap transition-colors duration-300 hover:bg-gray-300">
                    {{ $tag }}
                </span>
            @endforeach
        @else
        @endif --}}
    </div>

    <!-- Company Info -->
    <div class="flex items-center gap-2">
        <img class="object-cover rounded-full size-7"
             src="{{ $companyLogo ?? $imageUrl }}"
             alt="{{ $companies }}"
             loading="lazy" />
        <span class="text-main text-xs font-normal font-['Poppins'] truncate">
            {{ $companies }}
        </span>
    </div>
</div>
