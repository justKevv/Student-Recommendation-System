@props(['title' => 'Location'])

<div
    class="size- px-3.5 py-2 bg-white rounded-[20px] outline outline-offset-[-1px] outline-stone-300 inline-flex justify-start items-center gap-2.5">
    <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">{{ $title }}</div>
    <div data-svg-wrapper class="relative">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12.568 4.63091C12.4039 4.46687 12.1814 4.37472 11.9494 4.37472C11.7174 4.37472 11.4949 4.46687 11.3308 4.63091L6.99953 8.96216L2.66828 4.6309C2.50325 4.47152 2.28223 4.38332 2.0528 4.38531C1.82338 4.38731 1.60392 4.47933 1.44169 4.64156C1.27946 4.8038 1.18743 5.02326 1.18544 5.25268C1.18345 5.4821 1.27164 5.70313 1.43103 5.86815L6.38091 10.818C6.54499 10.9821 6.76751 11.0742 6.99953 11.0742C7.23155 11.0742 7.45407 10.9821 7.61816 10.818L12.568 5.86816C12.7321 5.70407 12.8242 5.48155 12.8242 5.24953C12.8242 5.01751 12.7321 4.79499 12.568 4.63091Z"
                fill="#727272" />
        </svg>
    </div>
</div>
