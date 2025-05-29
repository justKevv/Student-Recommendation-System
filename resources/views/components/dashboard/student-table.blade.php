<div
    class="mt-6 mb-12 pw-[300px] sm:w-[600px] md:w-[900px] lg:w-[1200px] xl:w-[1460px] px-5 py-3.5 bg-white rounded-[30px] inline-flex flex-col justify-start items-start gap-5">
    <div class="inline-flex justify-between items-center self-stretch h-10">
        <div class="w-60 h-8 justify-start text-main text-2xl font-medium font-['Poppins']">Student Internship</div>
        <div
            class="w-48 h-10 px-5 py-2.5 bg-white rounded-[50px] outline outline-stone-300 inline-flex flex-col justify-center items-start gap-2.5">
            <div class="inline-flex gap-2.5 justify-start items-center size-">
                <div class="relative size-4">
                    <div data-svg-wrapper class="relative">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.0001 14.0001L11.1048 11.1048M11.1048 11.1048C11.6001 10.6095 11.9929 10.0216 12.261 9.3745C12.529 8.72742 12.6669 8.03387 12.6669 7.33347C12.6669 6.63307 12.529 5.93953 12.261 5.29244C11.9929 4.64535 11.6001 4.0574 11.1048 3.56214C10.6095 3.06688 10.0216 2.67402 9.3745 2.40599C8.72742 2.13795 8.03387 2 7.33347 2C6.63307 2 5.93953 2.13795 5.29244 2.40599C4.64535 2.67402 4.0574 3.06688 3.56214 3.56214C2.56192 4.56236 2 5.91895 2 7.33347C2 8.748 2.56192 10.1046 3.56214 11.1048C4.56236 12.105 5.91895 12.6669 7.33347 12.6669C8.748 12.6669 10.1046 12.105 11.1048 11.1048Z"
                                stroke="#727272" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <div class="justify-start text-neutral-500 text-sm font-normal font-['Poppins']">Search by name...</div>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-2 w-full">
        {{ $slot }}
    </div>

    <div class="inline-flex justify-between items-center self-stretch">
        <div class="flex gap-3 justify-start items-center size-">
            <div class="w-16 h-8 relative rounded-[20px] outline  outline-offset-[-1px] outline-stone-300">
                <div class="w-9 left-[16px] top-[5px] absolute inline-flex justify-between items-center">
                    <div class="flex gap-3.5 justify-start items-center size-">
                        <div class="text-center justify-start text-black text-sm font-normal font-['Poppins']">10</div>
                    </div>
                    <div class="inline-flex flex-col justify-start items-start w-2.5">
                        <div data-svg-wrapper class="relative">
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.24991 8.41659H8.74991C8.82585 8.41635 8.90028 8.39541 8.96519 8.35601C9.03011 8.31662 9.08306 8.26027 9.11833 8.19303C9.1536 8.12578 9.16987 8.05019 9.16537 7.97439C9.16088 7.89859 9.1358 7.82545 9.09283 7.76284L5.34283 2.34617C5.18741 2.12159 4.81325 2.12159 4.65741 2.34617L0.907414 7.76284C0.864007 7.82532 0.838553 7.89849 0.833816 7.97442C0.829079 8.05035 0.84524 8.12612 0.880544 8.19351C0.915849 8.2609 0.968945 8.31732 1.03407 8.35665C1.09919 8.39598 1.17384 8.41671 1.24991 8.41659Z"
                                    fill="#24272E" />
                            </svg>
                        </div>
                        <div data-svg-wrapper class="relative">
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.24991 2.58341H8.74991C8.82585 2.58365 8.90028 2.60459 8.96519 2.64399C9.03011 2.68338 9.08306 2.73973 9.11833 2.80697C9.1536 2.87422 9.16987 2.94981 9.16537 3.02561C9.16088 3.10141 9.1358 3.17455 9.09283 3.23716L5.34283 8.65383C5.18741 8.87841 4.81325 8.87841 4.65741 8.65383L0.907414 3.23716C0.864007 3.17468 0.838553 3.10151 0.833816 3.02558C0.829079 2.94965 0.84524 2.87388 0.880544 2.80649C0.915849 2.7391 0.968945 2.68268 1.03407 2.64335C1.09919 2.60402 1.17384 2.58329 1.24991 2.58341Z"
                                    fill="#24272E" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-24 justify-center text-main text-xs font-normal font-['Poppins']">Entries per page</div>
        </div>

        <div class="flex gap-3.5 justify-start items-center">
            <div class="flex gap-2.5 justify-center items-center w-8 h-8 rounded-full bg-main">
                <div class="relative origin-top-left size-3.5">
                    <div data-svg-wrapper class="relative">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.36909 1.43197C9.53313 1.59606 9.62528 1.81858 9.62528 2.05059C9.62528 2.28261 9.53313 2.50513 9.36909 2.66922L5.03784 7.00047L9.36909 11.3317C9.52848 11.4967 9.61668 11.7178 9.61468 11.9472C9.61269 12.1766 9.52067 12.3961 9.35844 12.5583C9.1962 12.7205 8.97674 12.8126 8.74732 12.8146C8.5179 12.8166 8.29687 12.7284 8.13185 12.569L3.18197 7.61909C3.01793 7.45501 2.92578 7.23249 2.92578 7.00047C2.92578 6.76845 3.01793 6.54593 3.18197 6.38184L8.13184 1.43197C8.29593 1.26793 8.51845 1.17578 8.75047 1.17578C8.98249 1.17578 9.20501 1.26793 9.36909 1.43197Z"
                                fill="#F5F2ED" fill-opacity="0.7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex gap-5 justify-start items-center size-">
                <div class="size-6 px-3 py-[5px] rounded-2xl inline-flex flex-col justify-center items-center gap-2.5">
                    <div class="text-center justify-start text-main text-sm font-normal font-['Poppins']">1</div>
                </div>
            </div>

            <div
                class="w-8 h-8 rounded-[20px] outline  outline-offset-[-1px] outline-stone-300 flex justify-center items-center gap-2.5">
                <div class="relative origin-top-left size-3.5">
                    <div data-svg-wrapper class="relative">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.63091 1.43197C4.46687 1.59606 4.37472 1.81858 4.37472 2.05059C4.37472 2.28261 4.46687 2.50513 4.63091 2.66922L8.96216 7.00047L4.63091 11.3317C4.47152 11.4967 4.38332 11.7178 4.38532 11.9472C4.38731 12.1766 4.47933 12.3961 4.64156 12.5583C4.8038 12.7205 5.02326 12.8126 5.25268 12.8146C5.4821 12.8166 5.70313 12.7284 5.86815 12.569L10.818 7.61909C10.9821 7.45501 11.0742 7.23249 11.0742 7.00047C11.0742 6.76845 10.9821 6.54593 10.818 6.38184L5.86816 1.43197C5.70407 1.26793 5.48155 1.17578 5.24953 1.17578C5.01751 1.17578 4.79499 1.26793 4.63091 1.43197Z"
                                fill="#757575" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex gap-2.5 justify-start items-center size-">
            <div class="w-8 justify-center text-main text-xs font-normal font-['Poppins']">Page</div>
            <div class="w-14 h-8 relative rounded-[20px] outline  outline-offset-[-1px] outline-stone-300">
                <div class="w-7 left-[16px] top-[5px] absolute inline-flex justify-center items-center gap-3.5">
                    <div class="flex gap-3.5 justify-start items-center size-">
                        <div class="text-center justify-start text-black text-sm font-normal font-['Poppins']">1</div>
                    </div>
                    <div class="inline-flex flex-col justify-start items-start w-2">
                        <div data-svg-wrapper class="relative">
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.24991 8.41659H8.74991C8.82585 8.41635 8.90028 8.39541 8.96519 8.35601C9.03011 8.31662 9.08306 8.26027 9.11833 8.19303C9.1536 8.12578 9.16987 8.05019 9.16537 7.97439C9.16088 7.89859 9.1358 7.82545 9.09283 7.76284L5.34283 2.34617C5.18741 2.12159 4.81325 2.12159 4.65741 2.34617L0.907414 7.76284C0.864007 7.82532 0.838553 7.89849 0.833816 7.97442C0.829079 8.05035 0.84524 8.12612 0.880544 8.19351C0.915849 8.2609 0.968945 8.31732 1.03407 8.35665C1.09919 8.39598 1.17384 8.41671 1.24991 8.41659Z"
                                    fill="#24272E" />
                            </svg>
                        </div>
                        <div data-svg-wrapper class="relative">
                            <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.24991 2.58341H8.74991C8.82585 2.58365 8.90028 2.60459 8.96519 2.64399C9.03011 2.68338 9.08306 2.73973 9.11833 2.80697C9.1536 2.87422 9.16987 2.94981 9.16537 3.02561C9.16088 3.10141 9.1358 3.17455 9.09283 3.23716L5.34283 8.65383C5.18741 8.87841 4.81325 8.87841 4.65741 8.65383L0.907414 3.23716C0.864007 3.17468 0.838553 3.10151 0.833816 3.02558C0.829079 2.94965 0.84524 2.87388 0.880544 2.80649C0.915849 2.7391 0.968945 2.68268 1.03407 2.64335C1.09919 2.60402 1.17384 2.58329 1.24991 2.58341Z"
                                    fill="#24272E" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
