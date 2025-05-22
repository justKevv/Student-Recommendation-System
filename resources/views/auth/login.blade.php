<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex overflow-hidden relative justify-center items-center w-full min-h-screen bg-main">
        <div
            class="absolute -top-1/4 -left-1/4 w-1/2 bg-gradient-to-tr rounded-full md:w-1/3 lg:w-1/4 aspect-square sm:-left-1/10 sm:-top-1/9 from-main2 to-main">
        </div>
        <div
            class="absolute -right-1/4 -bottom-1/4 w-1/2 bg-gradient-to-tr rounded-full md:w-2/5 lg:w-1/3 aspect-square sm:-right-1/10 sm:-bottom-1/9 from-main3 via-main2 to-main">
        </div>
        <div
            class="w-[1107px] h-[759px] absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-screen p-4 sm:p-6 md:p-8 bg-white/20 rounded-[30px] outline outline-[1.50px] outline-white">
        </div>
        <div class="w-[1066px] h-[713px] relative z-1">
            <div class="w-[1066px] h-[713px] left-0 top-0 absolute bg-white rounded-[30px]"></div>
            <div class="w-96 h-[713px] left-0 top-0 absolute bg-main rounded-tl-[30px] rounded-bl-[30px]"></div>
            <div
                class="left-[54px] top-[320px] absolute justify-start text-white text-base font-normal font-['Poppins'] leading-normal">
                Explore top opportunities tailored<br />to your skills and goals.</div>
            <div
                class="left-[55px] top-[191px] absolute justify-start text-white text-3xl font-semibold font-['Poppins']">
                Find the Right <br />Internship for You</div>
            <div
                class="left-[127px] top-[92px] absolute justify-start text-white text-2xl font-normal font-['Poppins']">
                NextStep</div>
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
            <img class="size-80 left-[54px] top-[383px] absolute"
                src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/asset_12986498.png?updatedAt=1747909772295" />
            <div class="size- left-[536px] top-[220px] absolute inline-flex flex-col justify-center items-start gap-1">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="justify-start"><span class="text-main text-sm font-medium font-['Poppins']">Email
                        </span><span class="text-red-700 text-sm font-medium font-['Poppins']">*</span></div>
                    <div
                        class="w-110 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.1px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3">
                        <input type="email" name="email" placeholder="Enter your email"
                            class="justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] outline-none" />
                    </div>
            </div>
            <div class="size- left-[536px] top-[326px] absolute inline-flex flex-col justify-start items-start gap-1">
                <div class="justify-start"><span class="text-main text-sm font-medium font-['Poppins']">Password
                    </span><span class="text-red-700 text-sm font-medium font-['Poppins']">*</span></div>
                <div
                    class="w-110 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3">
                    <input type="password" name="password" placeholder="Enter your password"
                        class="justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] outline-none" />
                </div>
            </div>
            <div
                class="size- left-[536px] top-[432px] absolute outline-offset-[-1px] inline-flex justify-center items-center gap-2">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" class="sr-only peer">

                    <svg class="w-5 h-5 text-gray-400 peer-checked:hidden" width="20" height="20" viewBox="0 0 20 20"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="19" height="19" rx="4.5" stroke="currentColor" />
                    </svg>

                    <svg class="hidden w-5 h-5 text-yellow-500 peer-checked:block" width="20" height="20"
                        viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="19" height="19" rx="4.5" fill="currentColor"
                            stroke="currentColor" />
                        <path d="M6 10.5L9 13.5L14.5 7" stroke="white" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                    <span class="ml-2 justify-start text-neutral-500 text-xs font-normal font-['Poppins']">Remember
                        Me</span>
                </label>
            </div>
            <a href="#"
                class="left-[870px] top-[435px] absolute justify-start text-orange-800 text-xs font-normal font-['Poppins']">
                Forgot Password?</a>
            <div <div
                class="w-110 h-12 px-48 py-5 left-[536px] top-[492px] absolute bg-yellow-500 rounded-[50px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] inline-flex justify-center items-center gap-2.5">
                <button type="submit"
                    class="justify-start text-white text-base font-semibold font-['Poppins']">Login</button>
            </div>
            </form>
            </form>
            <div data-svg-wrapper class="left-[533px] top-[103px] absolute">
                <svg width="67" height="76" viewBox="0 0 67 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.4 75.4545C5.365 75.4545 3.62353 74.7163 2.1756 73.2399C0.727667 71.7635 0.00246667 69.9866 0 67.9091V15.0909C0 13.0159 0.7252 11.2402 2.1756 9.76382C3.626 8.28742 5.36747 7.54797 7.4 7.54545H22.94C23.7417 5.28182 25.0835 3.45833 26.9656 2.075C28.8477 0.691666 30.9591 0 33.3 0C35.6409 0 37.7536 0.691666 39.6381 2.075C41.5226 3.45833 42.8633 5.28182 43.66 7.54545H59.2C61.235 7.54545 62.9777 8.28491 64.4281 9.76382C65.8785 11.2427 66.6024 13.0184 66.6 15.0909V35.6523C66.6 36.7841 66.1375 37.6644 65.2125 38.2932C64.2875 38.922 63.3008 39.0477 62.2525 38.6704C61.2042 38.3561 60.1089 38.1196 58.9669 37.9612C57.8248 37.8027 56.6692 37.7248 55.5 37.7273C54.8216 37.7273 54.1889 37.7436 53.6019 37.7763C53.0148 37.809 52.4142 37.887 51.8 38.0102C51.4916 37.9473 51.1217 37.8845 50.69 37.8216C50.3817 37.8216 49.9968 37.8065 49.5356 37.7763C49.0743 37.7461 48.5958 37.7298 48.1 37.7273H18.5C17.4517 37.7273 16.5735 38.0894 15.8656 38.8138C15.1577 39.5382 14.8025 40.4336 14.8 41.5C14.7975 42.5664 15.1527 43.4631 15.8656 44.1899C16.5785 44.9168 17.4566 45.2778 18.5 45.2727H37.4625C36.3525 46.3417 35.351 47.5049 34.4581 48.7625C33.5652 50.0201 32.7783 51.372 32.0975 52.8182H18.5C17.4517 52.8182 16.5735 53.1804 15.8656 53.9047C15.1577 54.6291 14.8025 55.5245 14.8 56.5909C14.7975 57.6573 15.1527 58.554 15.8656 59.2809C16.5785 60.0077 17.4566 60.3687 18.5 60.3636H29.8775C29.7542 60.9924 29.6777 61.6061 29.6481 62.2047C29.6185 62.8033 29.6025 63.4472 29.6 64.1364C29.6 65.3939 29.6617 66.5886 29.785 67.7205C29.9083 68.8523 30.1242 69.9526 30.4325 71.0216C30.7408 72.0905 30.5867 73.0966 29.97 74.0398C29.3533 74.9829 28.5208 75.4545 27.4725 75.4545H7.4ZM35.2906 11.4578C34.7652 11.9935 34.1017 12.2614 33.3 12.2614C32.5033 12.2664 31.841 11.9998 31.3131 11.4615C30.7852 10.9233 30.5225 10.2467 30.525 9.43182C30.5275 8.61691 30.7902 7.94159 31.3131 7.40586C31.836 6.87014 32.4983 6.60227 33.3 6.60227C34.1017 6.60227 34.764 6.87014 35.2869 7.40586C35.8098 7.94159 36.0725 8.61691 36.075 9.43182C36.0775 10.2467 35.816 10.922 35.2906 11.4578ZM48.1 30.1818H18.5C17.4566 30.1868 16.5785 29.8259 15.8656 29.099C15.1527 28.3722 14.7975 27.4755 14.8 26.4091C14.8025 25.3427 15.1577 24.4473 15.8656 23.7229C16.5735 22.9985 17.4517 22.6364 18.5 22.6364H48.1C49.1483 22.6364 50.0265 22.9985 50.7344 23.7229C51.4423 24.4473 51.7975 25.3427 51.8 26.4091C51.8025 27.4755 51.4485 28.3709 50.7381 29.0953C50.0277 29.8196 49.1483 30.1818 48.1 30.1818Z"
                        fill="#24272E" />
                </svg>
            </div>
            <div data-svg-wrapper class="left-[569.67px] top-[147.67px] absolute">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.8334 9.83317H17.1667V17.1665H9.83342V20.8332H17.1667V28.1665H20.8334V20.8332H28.1667V17.1665H20.8334V9.83317Z"
                        fill="#D0C7B6" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M19.0001 0.666504C8.89841 0.666504 0.666748 8.89817 0.666748 18.9998C0.666748 29.1015 8.89841 37.3332 19.0001 37.3332H33.6667C35.6834 37.3332 37.3334 35.6832 37.3334 33.6665V18.9998C37.3334 8.89817 29.1017 0.666504 19.0001 0.666504ZM4.33341 18.9998C4.33341 27.0848 10.9151 33.6665 19.0001 33.6665C27.0851 33.6665 33.6667 27.0848 33.6667 18.9998C33.6667 10.9148 27.0851 4.33317 19.0001 4.33317C10.9151 4.33317 4.33341 10.9148 4.33341 18.9998Z"
                        fill="#FEC01A" />
                </svg>
            </div>
            <div class="left-[614px] top-[104px] absolute justify-start"><span
                    class="text-main text-5xl font-bold font-['Poppins'] tracking-wide">N</span><span
                    class="text-main text-4xl font-bold font-['Poppins'] tracking-wide">ext</span><span
                    class="text-main text-5xl font-bold font-['Poppins'] tracking-wide">S</span><span
                    class="text-main text-4xl font-bold font-['Poppins'] tracking-wide">tep</span></div>
            <div
                class="left-[617px] top-[157px] absolute justify-start text-orange-800 text-xs font-normal font-['Poppins']">
                Where Opportunity Begin</div>
        </div>
<img alt="Decorative illustration" class="object-contain absolute bottom-0 left-0 w-1/2 h-auto select-none sm:w-2/5 md:w-1/3 lg:w-1/3"
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
        <img class="object-contain absolute top-0 right-0 z-0 w-full h-auto sm:w-3/4 d:w-1/2 lg:w-2/5 xl:w-1/2"
            oncontextmenu="return false;"
            src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/assets_3812706.png?updatedAt=1747811615543" />
    </div>
</body>

</html>
