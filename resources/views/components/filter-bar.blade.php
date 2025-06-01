@props(['sort_by' => true])

<div class="inline-flex gap-4 justify-start items-center size-">
    @if ($sort_by)
        <div
            class="w-28 h-10 px-3 py-2 bg-white rounded-[20px] outline  outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5 whitespace-nowrap">
            <div class="inline-flex gap-2.5 justify-center items-center size-">
                <div data-svg-wrapper>
                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 5.5C2 5.155 2.28 4.875 2.625 4.875H14.375C14.5408 4.875 14.6997 4.94085 14.8169 5.05806C14.9342 5.17527 15 5.33424 15 5.5C15 5.66576 14.9342 5.82473 14.8169 5.94194C14.6997 6.05915 14.5408 6.125 14.375 6.125H2.625C2.28 6.125 2 5.845 2 5.5ZM4 9C4 8.655 4.28 8.375 4.625 8.375H12.375C12.5408 8.375 12.6997 8.44085 12.8169 8.55806C12.9342 8.67527 13 8.83424 13 9C13 9.16576 12.9342 9.32473 12.8169 9.44194C12.6997 9.55915 12.5408 9.625 12.375 9.625H4.625C4.28 9.625 4 9.345 4 9ZM6.625 11.875C6.45924 11.875 6.30027 11.9408 6.18306 12.0581C6.06585 12.1753 6 12.3342 6 12.5C6 12.6658 6.06585 12.8247 6.18306 12.9419C6.30027 13.0592 6.45924 13.125 6.625 13.125H10.375C10.5408 13.125 10.6997 13.0592 10.8169 12.9419C10.9342 12.8247 11 12.6658 11 12.5C11 12.3342 10.9342 12.1753 10.8169 12.0581C10.6997 11.9408 10.5408 11.875 10.375 11.875H6.625Z"
                            fill="#727272" />
                    </svg>
                </div>
                <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">Sort by</div>
            </div>
        </div>
    @endif
    {{ $slot }}
</div>
