@props([
    'recommendations' => collect()
])

<div id="recommendations-modal" class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80" role="dialog" tabindex="-1" aria-labelledby="recommendations-modal-label">
    <div class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 min-h-[calc(100%-56px)] flex items-center justify-center">
        <div class="flex flex-col w-full max-w-4xl bg-white border border-gray-200 shadow-2xl pointer-events-auto rounded-xl">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h3 id="recommendations-modal-label" class="text-2xl font-bold text-main font-['Poppins']">
                    Top 10 Recommended Internships
                </h3>                <button type="button"
                    class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#recommendations-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 overflow-y-auto max-h-[70vh]">
                @if($recommendations->isNotEmpty())
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @foreach($recommendations as $index => $recommendation)
                            <div class="relative">
                                <!-- Ranking Badge -->
                                <div class="absolute -top-2 -left-2 z-10 w-8 h-8 bg-redgoon text-white rounded-full flex items-center justify-center text-sm font-bold font-['Poppins']">
                                    {{ $index + 1 }}
                                </div>

                                <!-- Recommendation Card -->
                                <a href="{{ route('detail.job', $recommendation->slug) }}"
                                   class="block w-full p-4 bg-recommend rounded-[20px] transition-all duration-300 hover:shadow-lg hover:scale-[1.02] group border-2 border-transparent hover:border-redgoon">
                                    <div class="flex items-start gap-3">
                                        <img class="flex-shrink-0 transition-all duration-300 rounded-full size-12 group-hover:scale-110"
                                             src="{{ $recommendation->company->logo ?? 'https://placehold.co/48x48' }}"
                                             alt="{{ $recommendation->title }}"
                                             loading="lazy" />
                                        <div class="flex flex-col flex-1 min-w-0 space-y-2">
                                            <div class="space-y-1">
                                                <h4 class="text-main text-base font-semibold font-['Poppins'] leading-tight line-clamp-2 group-hover:text-yellowgoon transition-colors duration-300">
                                                    {{ $recommendation->title }}
                                                </h4>
                                                <p class="text-main text-sm font-medium font-['Poppins'] line-clamp-1 opacity-75">
                                                    {{ $recommendation->company->name }}
                                                </p>
                                                <div class="flex items-center gap-2 text-xs">
                                                    <span class="text-gray-600 font-['Poppins']">
                                                        📍 {{ $recommendation->location }}
                                                    </span>
                                                    <span class="text-gray-600 font-['Poppins']">
                                                        💼 {{ ucfirst($recommendation->type) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                                <span class="text-red-500 text-xs font-medium font-['Poppins']">
                                                    {{ $recommendation->open_until ? $recommendation->open_until->format('d M Y') : 'No deadline' }}
                                                </span>
                                                <span class="text-main text-sm font-normal font-['Poppins']">
                                                    Applied: {{ $recommendation->applications->count() }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-medium text-gray-900">No Recommendations Available</h3>
                        <p class="text-gray-600">We're working on finding the best internships for you. Please check back later!</p>
                    </div>
                @endif
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end px-6 py-4 border-t border-gray-200 gap-x-3">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-recommendations-modal">
                    Close
                </button>
                <a href="{{ route('internship') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium border border-transparent rounded-lg gap-x-2 bg-main text-yellowgoon hover:bg-neutral-700 focus:outline-hidden focus:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                    View All Internships
                </a>
            </div>
        </div>
    </div>
</div>
