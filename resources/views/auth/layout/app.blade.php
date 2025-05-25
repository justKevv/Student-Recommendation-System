<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="relative flex items-center justify-center w-full min-h-screen overflow-hidden bg-main">
        <div
            class="absolute w-1/2 rounded-full -top-1/4 -left-1/4 bg-gradient-to-tr md:w-1/3 lg:w-1/4 aspect-square sm:-left-1/10 sm:-top-1/9 from-main2 to-main">
        </div>
        <div
            class="absolute w-1/2 rounded-full -right-1/4 -bottom-1/4 bg-gradient-to-tr md:w-2/5 lg:w-1/3 aspect-square sm:-right-1/10 sm:-bottom-1/9 from-main3 via-main2 to-main">
        </div>
        <div
            class="w-[1107px] h-[759px] absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-screen p-4 sm:p-6 md:p-8 bg-white/20 rounded-[30px] outline outline-[1.50px] outline-white">
        </div>

        <div class="w-[1066px] h-[713px] relative z-1">
            <div class="w-[1066px] h-[713px] left-0 top-0 absolute bg-white rounded-[30px]"></div>
            <div class="w-96 h-[713px] left-0 top-0 absolute bg-main rounded-tl-[30px] rounded-bl-[30px]"></div>
            <div
                class="left-[127px] top-[92px] absolute justify-start text-white text-2xl font-normal font-['Poppins']">
                NextStep</div>
            @yield('content')
            <div data-svg-wrapper class="left-[55px] top-[85px] absolute">
                <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="22.5" cy="22.5" r="22.5" fill="#5A5F6B" />
                </svg>
            </div>
            <div data-svg-wrapper class="left-[78px] top-[105px] absolute">
                <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="14.5" cy="14.5" r="14.5" fill="#DEE2F2" />
                </svg>
            </div>
        </div>
        <img alt="Decorative illustration"
            class="absolute bottom-0 left-0 object-contain w-1/2 h-auto select-none sm:w-2/5 md:w-1/3 lg:w-1/3"
            oncontextmenu="return false;"
            src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/assets_19461198.png?updatedAt=1747836011458" />

        <div data-svg-wrapper class="left-[19px] top-[33px] absolute">
            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17.5" cy="17.5" r="17.5" fill="#5A5F6B" />
            </svg>
        </div>
        <div data-svg-wrapper class="left-[516px] top-[13px] absolute">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="8" r="8" fill="#5A5F6B" />
            </svg>
        </div>
        <div data-svg-wrapper class="left-[1147px] top-[970px] absolute">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8" cy="8" r="8" fill="#5A5F6B" />
            </svg>
        </div>
        <div data-svg-wrapper class="left-[1384px] top-[819px] absolute">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="17" cy="17" r="17" fill="#5A5F6B" />
            </svg>
        </div>
        <img class="absolute top-0 right-0 z-0 object-contain w-full h-auto sm:w-3/4 d:w-1/2 lg:w-2/5 xl:w-1/2"
            oncontextmenu="return false;"
            src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/assets_3812706.png?updatedAt=1747811615543" />
    </div>
</body>

</html>
