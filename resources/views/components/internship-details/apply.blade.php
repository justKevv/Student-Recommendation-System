@props([
    'people' => 21
])
<div class="p-6 bg-white rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <div class="flex space-x-4">
            <button class="flex items-center text-main hover:text-neutral-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </button>
            <button class="flex items-center text-main hover:text-neutral-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </button>
        </div>
    </div>

    <button class="py-3 w-full text-lg font-semibold text-white rounded-full transition duration-300 bg-main hover:bg-neutral-900">Apply</button>

    <div class="pb-5 border-b border-neutral-200">
    </div>
    <div class="grid grid-cols-2 gap-4 mt-6">
        <div class="flex items-center p-2 rounded-lg">
            <div class="inline-flex gap-2.5 justify-start items-end size-">
                <div class="size-11 p-2.5 bg-yellowpiss rounded-[10px] shadow-[0px_4px_20px_0px_rgba(0,0,0,0.05)] flex justify-center items-center gap-2.5">
                  <div data-svg-wrapper class="relative">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_878_4749)">
                    <path d="M0.5 18.5V16.925C0.5 16.2083 0.866667 15.625 1.6 15.175C2.33333 14.725 3.3 14.5 4.5 14.5C4.71667 14.5 4.925 14.5042 5.125 14.5125C5.325 14.5208 5.51667 14.5417 5.7 14.575C5.46667 14.925 5.29167 15.2917 5.175 15.675C5.05833 16.0583 5 16.4583 5 16.875V18.5H0.5ZM6.5 18.5V16.875C6.5 16.3417 6.64583 15.8542 6.9375 15.4125C7.22917 14.9708 7.64167 14.5833 8.175 14.25C8.70833 13.9167 9.34583 13.6667 10.0875 13.5C10.8292 13.3333 11.6333 13.25 12.5 13.25C13.3833 13.25 14.1958 13.3333 14.9375 13.5C15.6792 13.6667 16.3167 13.9167 16.85 14.25C17.3833 14.5833 17.7917 14.9708 18.075 15.4125C18.3583 15.8542 18.5 16.3417 18.5 16.875V18.5H6.5ZM20 18.5V16.875C20 16.4417 19.9458 16.0333 19.8375 15.65C19.7292 15.2667 19.5667 14.9083 19.35 14.575C19.5333 14.5417 19.7208 14.5208 19.9125 14.5125C20.1042 14.5042 20.3 14.5 20.5 14.5C21.7 14.5 22.6667 14.7208 23.4 15.1625C24.1333 15.6042 24.5 16.1917 24.5 16.925V18.5H20ZM8.625 16.5H16.4C16.2333 16.1667 15.7708 15.875 15.0125 15.625C14.2542 15.375 13.4167 15.25 12.5 15.25C11.5833 15.25 10.7458 15.375 9.9875 15.625C9.22917 15.875 8.775 16.1667 8.625 16.5ZM4.5 13.5C3.95 13.5 3.47917 13.3042 3.0875 12.9125C2.69583 12.5208 2.5 12.05 2.5 11.5C2.5 10.9333 2.69583 10.4583 3.0875 10.075C3.47917 9.69167 3.95 9.5 4.5 9.5C5.06667 9.5 5.54167 9.69167 5.925 10.075C6.30833 10.4583 6.5 10.9333 6.5 11.5C6.5 12.05 6.30833 12.5208 5.925 12.9125C5.54167 13.3042 5.06667 13.5 4.5 13.5ZM20.5 13.5C19.95 13.5 19.4792 13.3042 19.0875 12.9125C18.6958 12.5208 18.5 12.05 18.5 11.5C18.5 10.9333 18.6958 10.4583 19.0875 10.075C19.4792 9.69167 19.95 9.5 20.5 9.5C21.0667 9.5 21.5417 9.69167 21.925 10.075C22.3083 10.4583 22.5 10.9333 22.5 11.5C22.5 12.05 22.3083 12.5208 21.925 12.9125C21.5417 13.3042 21.0667 13.5 20.5 13.5ZM12.5 12.5C11.6667 12.5 10.9583 12.2083 10.375 11.625C9.79167 11.0417 9.5 10.3333 9.5 9.5C9.5 8.65 9.79167 7.9375 10.375 7.3625C10.9583 6.7875 11.6667 6.5 12.5 6.5C13.35 6.5 14.0625 6.7875 14.6375 7.3625C15.2125 7.9375 15.5 8.65 15.5 9.5C15.5 10.3333 15.2125 11.0417 14.6375 11.625C14.0625 12.2083 13.35 12.5 12.5 12.5ZM12.5 10.5C12.7833 10.5 13.0208 10.4042 13.2125 10.2125C13.4042 10.0208 13.5 9.78333 13.5 9.5C13.5 9.21667 13.4042 8.97917 13.2125 8.7875C13.0208 8.59583 12.7833 8.5 12.5 8.5C12.2167 8.5 11.9792 8.59583 11.7875 8.7875C11.5958 8.97917 11.5 9.21667 11.5 9.5C11.5 9.78333 11.5958 10.0208 11.7875 10.2125C11.9792 10.4042 12.2167 10.5 12.5 10.5Z" fill="#393939"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_878_4749">
                    <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)"/>
                    </clipPath>
                    </defs>
                    </svg>
                  </div>
                </div>
                <div class="inline-flex flex-col gap-1 justify-start items-start w-14">
                  <div class="self-stretch justify-start text-main text-sm font-normal font-['Poppins'] tracking-wide">Applied </div>
                  <div class="self-stretch justify-start text-main text-sm font-medium font-['Poppins'] tracking-wide">{{ $people }}</div>
                </div>
              </div>
        </div>
    </div>
</div>
