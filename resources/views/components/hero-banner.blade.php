@props([
    'imageUrl' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashbard_assest_37641278.png',
    'background' => 'dashboard2',
    'class' => ''
])

<div class="w-full max-w-none lg:max-w-[800px] xl:max-w-[900px] 2xl:max-w-[1000px] h-64 relative flex-shrink-0 {{ $class }}">
    <!-- Background -->
    <div class="w-full h-64 bg-{{ $background }} rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)]"></div>

    <!-- Hero Image -->
    <img class="w-[711px] h-64 right-0 top-0 absolute object-cover rounded-r-[30px]"
         src="{{ $imageUrl }}"
         alt="Dashboard hero image" />

    <!-- Content -->
    {{ $slot }}

</div>
