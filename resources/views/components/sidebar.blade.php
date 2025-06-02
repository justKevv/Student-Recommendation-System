<div
    class="fixed left-2 top-20 z-[60] sm:left-3 sm:top-24 md:left-4 md:top-[100px] lg:left-6 lg:top-[115px] xl:left-[75px] xl:top-[125px] 2xl:left-[75px] 2xl:top-[125px]">
    <div class="w-17 py-4 bg-white rounded-[79px] inline-flex flex-col justify-start items-center shadow-[0px_0px_15px_0px_rgba(0,0,0,0.08)] sm:rounded-[79px] md:shadow-[0px_0px_18px_0px_rgba(0,0,0,0.09)] xl:shadow-[0px_0px_20px_0px_rgba(0,0,0,0.10)]">
        <div class="flex flex-col gap-6 justify-start items-center w-14">
            {{ $slot }}
        </div>
    </div>
</div>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit"
        class="fixed left-2 bottom-8 z-[60] sm:left-3 sm:bottom-10 md:left-4 md:bottom-12 lg:left-6 lg:bottom-14 xl:left-[75px] xl:bottom-16">
        <div
            class="size-12 p-3 bg-white rounded-full shadow-[0px_0px_15px_0px_rgba(0,0,0,0.08)] inline-flex justify-center items-center cursor-pointer transition-all duration-300 hover:shadow-[0px_0px_25px_0px_rgba(0,0,0,0.15)] sm:size-[52px] sm:p-3 md:size-14 md:p-3.5 md:shadow-[0px_0px_18px_0px_rgba(0,0,0,0.09)] md:hover:shadow-[0px_0px_28px_0px_rgba(0,0,0,0.18)] xl:size-16 xl:shadow-[0px_0px_20px_0px_rgba(0,0,0,0.10)] xl:hover:shadow-[0px_0px_30px_0px_rgba(0,0,0,0.20)]">
            <div data-svg-wrapper data-style="outline" class="relative">
                <svg width="20" height="20" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="sm:w-5 sm:h-5 md:w-6 md:h-6 xl:w-8 xl:h-8">
                    <path
                        d="M12.18 2.80669H12.3534C18.2734 2.80669 21.1267 5.14003 21.62 10.3667C21.6734 10.9134 21.2734 11.4067 20.7134 11.46C20.18 11.5134 19.6734 11.1 19.62 10.5534C19.2334 6.3667 17.26 4.80669 12.34 4.80669H12.1667C6.74002 4.80669 4.82002 6.72669 4.82002 12.1534L4.82002 20.8467C4.82002 26.2734 6.74002 28.1934 12.1667 28.1934H12.34C17.2867 28.1934 19.26 26.6067 19.62 22.34C19.6867 21.7934 20.1534 21.38 20.7134 21.4334C21.2734 21.4734 21.6734 21.9667 21.6334 22.5134C21.18 27.82 18.3134 30.1934 12.3534 30.1934H12.18C5.63336 30.1934 2.83335 27.3934 2.83335 20.8467L2.83335 12.1534C2.83335 5.60669 5.63336 2.80669 12.18 2.80669Z"
                        fill="#757575" />
                    <path
                        d="M12.5 15.5L27.6733 15.5C28.22 15.5 28.6733 15.9533 28.6733 16.5C28.6733 17.0467 28.22 17.5 27.6733 17.5L12.5 17.5C11.9533 17.5 11.5 17.0467 11.5 16.5C11.5 15.9533 11.9533 15.5 12.5 15.5Z"
                        fill="#757575" />
                    <path
                        d="M24.7 11.0334C24.9533 11.0334 25.2067 11.1267 25.4067 11.3267L29.8733 15.7934C30.26 16.18 30.26 16.82 29.8733 17.2067L25.4067 21.6734C25.02 22.06 24.38 22.06 23.9933 21.6734C23.6067 21.2867 23.6067 20.6467 23.9933 20.26L27.7533 16.5L23.9933 12.74C23.6067 12.3534 23.6067 11.7134 23.9933 11.3267C24.18 11.1267 24.4467 11.0334 24.7 11.0334Z"
                        fill="#757575" />
                </svg>
            </div>
        </div>
    </button>
</form>
