@props([
    'location' => 'Jakarta',
    'company' => 'PT. Adevian',
    'applied' => 10,
    'company_id' => 1,
    'modalTarget' => '#hs-large-modal',
])

<div class="w-[630px] px-5 py-5 bg-white rounded-[20px] inline-flex flex-col justify-start items-start gap-0 cursor-pointer hover:shadow-lg transition-all duration-300" aria-haspopup="dialog" aria-expanded="false" aria-controls="{{ str_replace('#', '', $modalTarget) }}" data-hs-overlay="{{ $modalTarget }}">
    <div class="flex flex-col items-start self-stretch justify-start">
        <div class="size- inline-flex justify-center items-center gap-[3px]">
            <div data-svg-wrapper class="relative">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.99928 17.13C9.86872 17.13 9.73817 17.1086 9.60761 17.0658C9.47705 17.0231 9.35705 16.9536 9.24761 16.8575C8.65483 16.3125 8.05372 15.7056 7.44428 15.0367C6.83539 14.3683 6.28261 13.6758 5.78594 12.9592C5.28928 12.2425 4.8815 11.5111 4.56261 10.765C4.24372 10.0189 4.08483 9.29056 4.08594 8.58C4.08594 6.81722 4.65983 5.36333 5.80761 4.21833C6.95594 3.07278 8.35317 2.5 9.99928 2.5C11.6454 2.5 13.0426 3.07278 14.1909 4.21833C15.3387 5.36333 15.9126 6.81722 15.9126 8.58C15.9126 9.29056 15.7537 10.0164 15.4359 10.7575C15.1182 11.4981 14.7132 12.2292 14.2209 12.9508C13.7293 13.6731 13.179 14.3658 12.5701 15.0292C11.9612 15.6925 11.3598 16.2967 10.7659 16.8417C10.6598 16.9378 10.5393 17.01 10.4043 17.0583C10.2687 17.1061 10.1334 17.13 9.99844 17.13M10.0018 9.77583C10.3723 9.77583 10.689 9.64361 10.9518 9.37917C11.214 9.11528 11.3451 8.79778 11.3451 8.42667C11.3451 8.05556 11.2129 7.73889 10.9484 7.47667C10.684 7.21444 10.3665 7.08333 9.99594 7.08333C9.62539 7.08333 9.30872 7.21556 9.04594 7.48C8.78317 7.74444 8.65205 8.06194 8.65261 8.4325C8.65317 8.80306 8.78511 9.11972 9.04844 9.3825C9.31178 9.64528 9.62956 9.77639 10.0018 9.77583Z"
                        fill="#A74A4A" />
                </svg>
            </div>
            <div class="justify-start text-main text-sm font-normal font-['Poppins']">{{ $location }}</div>
        </div>
        <div class="inline-flex items-center self-stretch justify-between">
            <div class="inline-flex flex-col items-start justify-start w-96">
                <div class="self-stretch justify-start text-main text-xl font-semibold font-['Poppins'] tracking-wide">
                    {{ $company }}</div>
            </div>
            <img class="rounded-full size-16" src="https://placehold.co/65x65" />
        </div>
    </div>
    <div class="inline-flex gap-3.5 justify-start items-center size-">
        <div class="size- flex justify-start items-start gap-[3px]">
        </div>
    </div>
</div>
