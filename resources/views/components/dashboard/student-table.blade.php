@props(['paginator' => null])

<div
    class="mt-6 mb-12 w-[300px] sm:w-[600px] md:w-[900px] lg:w-[1200px] xl:w-[1460px] px-5 py-3.5 bg-white rounded-[30px] inline-flex flex-col justify-start items-center gap-5">
    <div class="inline-flex items-center self-stretch justify-between h-10">
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

    <div class="flex flex-col w-full gap-2">
        {{ $slot }}
    </div>

    {{-- Dynamic Pagination --}}
    @if($paginator)
        <nav class="flex items-center justify-center w-full">
            <ul class="flex space-x-2">
                @if ($paginator->onFirstPage())
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Prev</a></li>
                @endif

                @if($paginator->lastPage() > 0)
                    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @else
                    <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">1</span></li>
                @endif

                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Next</a></li>
                @else
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
                @endif
            </ul>
        </nav>
    @endif
</div>
</div>
