@props([
    'title' => 'Your Internship',
    'isEmpty' => true,
    'imgSource' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashboard_asset_1296379126?updatedAt=1748203880228',
])

<div class="w-full max-w-[1000px] h-64 relative">
    <!-- Section Title -->
    <h2 class="text-main text-xl font-medium font-['Poppins'] mb-4">
        {{ $title }}
    </h2>

    <!-- Content Container -->
    <div class="w-full h-52 bg-white/80 rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.05)] p-6">
        @if($isEmpty)
            <!-- Empty State -->
            <div class="flex flex-col justify-center items-center h-full text-center">
                <div class="mb-2">
                    <img class="w-[185px]" src="{{ $imgSource }}" alt="NO INTERNSHIP" loading="lazy" >
                </div>
                <h3 class="text-gray-600 text-lg font-medium font-['Poppins'] mb-2">No Active Internships</h3>
                <p class="text-gray-500 text-sm font-['Poppins']">You haven't applied to any internships yet. Start exploring opportunities!</p>
            </div>
        @else
            <!-- Internship Content -->
            {{ $slot }}
        @endif
    </div>
</div>
