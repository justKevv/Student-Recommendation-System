@extends('layout.app')

@section('title')
    Internship
@endsection

@section('content')
    <div class="inline-flex gap-6 justify-start items-center size-">
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
        <div
            class="w-28 h-10 px-3.5 py-2 bg-white rounded-[20px] outline  outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5">
            <div class="inline-flex gap-2.5 justify-start items-center size-">
                <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">Location</div>
                <div data-svg-wrapper class="relative">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.068 4.63139C12.9039 4.46736 12.6814 4.37521 12.4494 4.37521C12.2174 4.37521 11.9949 4.46736 11.8308 4.63139L7.49953 8.96264L3.16828 4.63139C3.00325 4.472 2.78223 4.38381 2.5528 4.3858C2.32338 4.3878 2.10392 4.47982 1.94169 4.64205C1.77946 4.80428 1.68743 5.02374 1.68544 5.25317C1.68345 5.48259 1.77164 5.70362 1.93103 5.86864L6.88091 10.8185C7.04499 10.9826 7.26751 11.0747 7.49953 11.0747C7.73155 11.0747 7.95407 10.9826 8.11816 10.8185L13.068 5.86864C13.2321 5.70456 13.3242 5.48204 13.3242 5.25002C13.3242 5.018 13.2321 4.79548 13.068 4.63139Z"
                            fill="#727272" />
                    </svg>
                </div>
            </div>
        </div>
        <div
            class="w-32 h-10 px-3.5 py-2 bg-white rounded-[20px] outline  outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5">
            <div class="inline-flex gap-2.5 justify-start items-center size-">
                <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">Work Type</div>
                <div data-svg-wrapper class="relative">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.568 4.63139C12.4039 4.46736 12.1814 4.37521 11.9494 4.37521C11.7174 4.37521 11.4949 4.46736 11.3308 4.63139L6.99953 8.96264L2.66828 4.63139C2.50325 4.472 2.28223 4.38381 2.0528 4.3858C1.82338 4.3878 1.60392 4.47982 1.44169 4.64205C1.27946 4.80428 1.18743 5.02374 1.18544 5.25317C1.18345 5.48259 1.27164 5.70362 1.43103 5.86864L6.38091 10.8185C6.54499 10.9826 6.76751 11.0747 6.99953 11.0747C7.23155 11.0747 7.45407 10.9826 7.61816 10.8185L12.568 5.86864C12.7321 5.70456 12.8242 5.48204 12.8242 5.25002C12.8242 5.018 12.7321 4.79548 12.568 4.63139Z"
                            fill="#727272" />
                    </svg>
                </div>
            </div>
        </div>
        <div
            class="w-32 h-10 px-3.5 py-2 bg-white rounded-[20px] outline  outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5">
            <div class="inline-flex gap-2.5 justify-start items-center size-">
                <div class="justify-center text-neutral-500 text-sm font-normal font-['Poppins']">Category</div>
                <div data-svg-wrapper class="relative">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.068 4.63139C12.9039 4.46736 12.6814 4.37521 12.4494 4.37521C12.2174 4.37521 11.9949 4.46736 11.8308 4.63139L7.49953 8.96264L3.16828 4.63139C3.00325 4.472 2.78223 4.38381 2.5528 4.3858C2.32338 4.3878 2.10392 4.47982 1.94169 4.64205C1.77946 4.80428 1.68743 5.02374 1.68544 5.25317C1.68345 5.48259 1.77164 5.70362 1.93103 5.86864L6.88091 10.8185C7.04499 10.9826 7.26751 11.0747 7.49953 11.0747C7.73155 11.0747 7.95407 10.9826 8.11816 10.8185L13.068 5.86864C13.2321 5.70456 13.3242 5.48204 13.3242 5.25002C13.3242 5.018 13.2321 4.79548 13.068 4.63139Z"
                            fill="#727272" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <x-dashboard.layout gap="30px" :class='"pt-6"' >
        <div class="space-x-6 space-y-6">
            @for ($i = 0; $i < 10; $i++)
                <x-internship.card />
            @endfor
        </div>

    </x-dashboard.layout>

@endsection
