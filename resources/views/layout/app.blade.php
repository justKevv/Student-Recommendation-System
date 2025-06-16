<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-y-auto bg-dashboard font-['Poppins']">
    <div class="w-full max-w-full mx-auto xl:max-w-[1440px]">
        <x-topbar
            :name='$user->name'
            :profileImage='$user->profile_picture'
            :searchBar="$user->role == 'student'"
        ></x-topbar>

        <x-sidebar>
            <x-sidebar-icon href="{{ route('dashboard') }}" is_active="{{ Route::currentRouteName() == 'dashboard' }}">
                <x-icons.home/>
            </x-sidebar-icon>
            <x-sidebar-icon
                href="{{ $internshipNavigation['href'] }}"
                is_active="{{ $internshipNavigation['isActive'] }}">
                <x-icons.internship/>
            </x-sidebar-icon>
            @if ($userManagementNavigation)
                <x-sidebar-icon
                    href="{{ $userManagementNavigation['href'] }}"
                    is_active="{{ $userManagementNavigation['isActive'] }}"
                    use_fill="{{ $userManagementNavigation['useFill'] }}"
                    use_stroke="{{ $userManagementNavigation['useStroke'] }}">
                    <x-dynamic-component :component="$userManagementNavigation['icon']"/>
                </x-sidebar-icon>
            @endif
        </x-sidebar>

        <!-- Content Area -->
        <div
            class="pt-20 ml-14 p-3 pb-20 sm:pt-24 sm:ml-16 sm:p-4 sm:pb-24 md:pt-28 md:ml-20 md:p-5 md:pb-28 lg:pt-32 lg:ml-24 lg:p-6 lg:pb-32 xl:pt-30 xl:ml-[75px] xl:p-0 xl:pb-36">
            <!-- Your main content goes here -->
            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>

</html>
