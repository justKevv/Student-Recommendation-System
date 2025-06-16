@extends('layout.app')

@section('title')
    Companies
@endsection

@section('content')
    <x-filter-bar>
        <x-filter-item :title='"Location"' />
        <x-filter-item :title='"Company"' />
    </x-filter-bar>
    <x-dashboard.layout gap="30px" :class='"pt-6"'>
        <div class="space-x-6 space-y-6">
            @foreach ($companies as $company)
                <x-supervisor.company
                    :company="$company->name"
                    :location="$company->city ?? $company->address"
                    :modalTarget="'#company-modal-' . $company->id"
                />
            @endforeach
        </div>
    </x-dashboard.layout>

    @foreach ($companies as $company)
    <div id="company-modal-{{ $company->id }}"
        class="fixed top-0 hidden overflow-x-hidden overflow-y-auto pointer-events-none hs-overlay size-full start-0 z-80"
        role="dialog" tabindex="-1" aria-labelledby="company-modal-label-{{ $company->id }}">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="flex flex-col w-full bg-white border border-gray-200 pointer-events-auto rounded-xl shadow-2xs">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                    <div class="flex items-center w-full gap-4">
                        <img class="rounded-full size-16" src="{{ $company->profile_picture ?? 'https://placehold.co/65x65' }}" />
                        <div class="flex flex-col items-start justify-start">
                            <div class="inline-flex items-center gap-[3px] mb-1">
                                <div data-svg-wrapper class="relative">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.99928 17.13C9.86872 17.13 9.73817 17.1086 9.60761 17.0658C9.47705 17.0231 9.35705 16.9536 9.24761 16.8575C8.65483 16.3125 8.05372 15.7056 7.44428 15.0367C6.83539 14.3683 6.28261 13.6758 5.78594 12.9592C5.28928 12.2425 4.8815 11.5111 4.56261 10.765C4.24372 10.0189 4.08483 9.29056 4.08594 8.58C4.08594 6.81722 4.65983 5.36333 5.80761 4.21833C6.95594 3.07278 8.35317 2.5 9.99928 2.5C11.6454 2.5 13.0426 3.07278 14.1909 4.21833C15.3387 5.36333 15.9126 6.81722 15.9126 8.58C15.9126 9.29056 15.7537 10.0164 15.4359 10.7575C15.1182 11.4981 14.7132 12.2292 14.2209 12.9508C13.7293 13.6731 13.179 14.3658 12.5701 15.0292C11.9612 15.6925 11.3598 16.2967 10.7659 16.8417C10.6598 16.9378 10.5393 17.01 10.4043 17.0583C10.2687 17.1061 10.1334 17.13 9.99844 17.13M10.0018 9.77583C10.3723 9.77583 10.689 9.64361 10.9518 9.37917C11.214 9.11528 11.3451 8.79778 11.3451 8.42667C11.3451 8.05556 11.2129 7.73889 10.9484 7.47667C10.684 7.21444 10.3665 7.08333 9.99594 7.08333C9.62539 7.08333 9.30872 7.21556 9.04594 7.48C8.78317 7.74444 8.65205 8.06194 8.65261 8.4325C8.65317 8.80306 8.78511 9.11972 9.04844 9.3825C9.31178 9.64528 9.62956 9.77639 10.0018 9.77583Z"
                                            fill="#A74A4A" />
                                    </svg>
                                </div>
                                <div class="text-main text-sm font-normal font-['Poppins']">{{ $company->city ?? $company->address }}</div>
                            </div>
                            <div class="text-main text-xl font-semibold font-['Poppins'] tracking-wide">
                                {{ $company->name }}
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="inline-flex items-center justify-center bg-gray-100 border border-transparent rounded-full gap-x-2 text-main size-8 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#company-modal-{{ $company->id }}">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 space-y-6 overflow-y-auto">
                    @foreach ($company->internships as $internship)
                        <div class="space-y-3">
                            <h3 class="text-lg font-semibold text-main font-['Poppins']">{{ $internship->title }}</h3>
                            @foreach ($internship->applications as $application)
                                <x-dashboard.student-pill
                                    href="{{ route('student-detail', $application->student->id) }}"
                                    :name="$application->student->user->name"
                                    :role="$application->internship->title"
                                    :profile="$application->student->user->profile_picture ?? 'https://placehold.co/65x65'"
                                    completed="{{ rand(0, 7) }}"
                                />
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
