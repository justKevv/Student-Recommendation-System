@props([
    'title' => 'Hello Adevian! Welcome back ',
    'badgeText' => 'Here’s the latest update on your internship students',
    'imageUrl' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashbard_assest_37641278.png',
    'background' => 'main', 
    'text' => 'white',
])

<div class="w-[1000px] max-w-[1000px] h-64 relative overflow-hidden rounded-[30px]"> 
    <div class="w-full h-full bg-{{ $background }} absolute object-cover rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]"></div>

    <img class="w-[711px] h-64 right-0 top-0 absolute object-cover rounded-r-[30px]"
         src="{{ $imageUrl }}"
         alt="Dashboard hero image" />

    <div class="absolute left-[27px] right-[300px] h-full flex flex-col justify-center py-4 z-10">
        <div class="space-y-3">
            <h1 class="text-{{ $text }} text-4xl font-bold font-['Poppins'] leading-tight">
                {{ $title }}
            </h1>
        </div>
        <p class="text-{{ $text }} text-lg font-medium font-['Poppins'] mt-2">
            {{ $badgeText }}
        </p>
    </div>
</div>