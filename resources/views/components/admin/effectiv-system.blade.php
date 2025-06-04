@props([
])

<div class="w-full max-w-none lg:max-w-[800px] xl:max-w-[900px] 2xl:max-w-[1000px] h-64 grid grid-cols-3 gap-6">
    <!-- Card 1 -->
    @for ($i = 0; $i < 3; $i++)
    <div class="relative flex-1 h-full">
        <div class="w-full h-full bg-white rounded-[30px] p-6 flex flex-col justify-between">
            <div class="flex flex-1 justify-center items-center">
                <div class="text-pink-800 text-6xl lg:text-7xl font-normal font-['Outfit']">10%</div>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex gap-2 items-center">
                    <div data-svg-wrapper>
                        <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.8533 8.43396L1.87907 0.207548C1.72813 0.0691833 1.53602 0 1.30274 0C1.06947 0 0.877358 0.0691833 0.726415 0.207548C0.575471 0.345913 0.5 0.522013 0.5 0.735849C0.5 0.949686 0.575471 1.12579 0.726415 1.26415L9.70068 9.49057H5.09005C4.85677 9.49057 4.66137 9.56302 4.50384 9.70792C4.34631 9.85283 4.26727 10.0319 4.26672 10.2453C4.26617 10.4586 4.34521 10.6377 4.50384 10.7826C4.66247 10.9275 4.85787 11 5.09005 11H11.6767C11.9099 11 12.1056 10.9275 12.2637 10.7826C12.4218 10.6377 12.5005 10.4586 12.5 10.2453V4.20755C12.5 3.99371 12.421 3.81434 12.2629 3.66943C12.1048 3.52453 11.9094 3.45233 11.6767 3.45283C11.4439 3.45333 11.2485 3.52579 11.0905 3.67019C10.9324 3.81459 10.8533 3.99371 10.8533 4.20755V8.43396Z" fill="#A74A4A"/>
                        </svg>
                    </div>
                    <div class="text-black text-xs font-medium font-['Poppins']">5%</div>
                </div>
            </div>
            <div class="text-center text-black text-xs font-medium font-['Poppins'] mt-2">
                Effectiveness of system Recommendations
            </div>
        </div>
    </div>
    @endfor

    {{-- <!-- Kontainer 2 -->
    <div class="relative flex-1 min-w-0">
        <div class="flex justify-between items-center mb-4">
            <!-- Header Kontainer 2 -->
        </div>
        <div class="w-full h-80 bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
            <!-- Isi Kontainer 2 -->
            <h2 class="text-center text-[80px] font-semibold text-[#FFC107]">55%</h2>
        <hr class="my-3 w-full border-t border-gray-200">
        <p class="text-lg font-medium leading-snug text-center text-black">
            Supervisor can<br>Intern
        </p>
        </div>
    </div>

    <!-- Kontainer 3 -->
    <div class="relative flex-1 min-w-0">
        <div class="flex justify-between items-center mb-4">
            <!-- Header Kontainer 3 -->
        </div>
        <div class="w-full h-80 bg-white rounded-[30px] shadow-[0px_0px_20px_0px_rgba(0,0,0,0.05)] p-6">
            <!-- Isi Kontainer 3 -->
             <h2 class="text-center text-[80px] font-semibold text-[#2C2C2C]">75%</h2>
        <hr class="my-3 w-full border-t border-gray-200">
        <p class="text-lg font-medium leading-snug text-center text-black">
            Student<br>Intership
        </p>
        </div>
    </div> --}}
</div>
