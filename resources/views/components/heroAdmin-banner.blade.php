@props([
    'title' => 'Hello Admin! Welcome Back',
    'subtitle' => 'Top Internship Opportunities',
    'imageUrl' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashbard_assest_37641278.png'
])

<div class="w-full max-w-[1000px] h-64 relative">
    <!-- Background -->
    <div class="w-full h-64 bg-main rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]"></div>

    <!-- Hero Image -->
    <img class="w-[711px] h-64 right-0 top-0 absolute object-cover rounded-r-[30px]"
         src="{{ $imageUrl }}"
         alt="Dashboard hero image" />

    <!-- Content -->
    <div class="absolute left-[27px] top-[23px] space-y-3">
        <!-- Title -->
        <div class="space-y-2">
            <h1 class="text-main6 text-3xl font-semibold font-['Poppins'] leading-tight">
                {{ $title }}
            </h1>
            <h2 class="text-main6 text-3xl font-semibold font-['Poppins'] leading-tight">
                {{ $subtitle }}
            </h2>
        </div>
    </div>
</div>