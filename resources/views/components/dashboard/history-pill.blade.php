@props([
    'companyLogo' => 'https://placehold.co/50x50',
    'status' => 'pending',
    'location' => 'Jakarta, Jawa Barat',
    'companyName' => 'The Software Practice',
    'position' => 'QA Engineer Intern',
    'deadline' => '21 June 2024',
])

<div
    class="self-stretch p-2.5 rounded-[40px] outline outline-offset-[-1px] outline-stone-300 flex justify-between items-center w-full">
    <div class="flex gap-2.5 items-center">
        <img class="rounded-full size-12" src="https://placehold.co/50x50" />
        <div class="inline-flex flex-col gap-0.5 justify-start items-start w-32">
            <div class="w-50 justify-center text-main text-xs font-medium font-['Poppins'] whitespace-nowrap">{{ $companyName }}
            </div>
            <div class="inline-flex gap-0.5 justify-start items-center self-stretch">
                <div data-svg-wrapper class="relative">
                    <svg width="15" height="16" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.99928 17.63C9.86872 17.63 9.73817 17.6086 9.60761 17.5658C9.47705 17.5231 9.35705 17.4536 9.24761 17.3575C8.65483 16.8125 8.05372 16.2056 7.44428 15.5367C6.83539 14.8683 6.28261 14.1758 5.78594 13.4592C5.28928 12.7425 4.8815 12.0111 4.56261 11.265C4.24372 10.5189 4.08483 9.79056 4.08594 9.08C4.08594 7.31722 4.65983 5.86333 5.80761 4.71833C6.95594 3.57278 8.35317 3 9.99928 3C11.6454 3 13.0426 3.57278 14.1909 4.71833C15.3387 5.86333 15.9126 7.31722 15.9126 9.08C15.9126 9.79056 15.7537 10.5164 15.4359 11.2575C15.1182 11.9981 14.7132 12.7292 14.2209 13.4508C13.7293 14.1731 13.179 14.8658 12.5701 15.5292C11.9612 16.1925 11.3598 16.7967 10.7659 17.3417C10.6598 17.4378 10.5393 17.51 10.4043 17.5583C10.2687 17.6061 10.1334 17.63 9.99844 17.63M10.0018 10.2758C10.3723 10.2758 10.689 10.1436 10.9518 9.87917C11.214 9.61528 11.3451 9.29778 11.3451 8.92667C11.3451 8.55556 11.2129 8.23889 10.9484 7.97667C10.684 7.71444 10.3665 7.58333 9.99594 7.58333C9.62539 7.58333 9.30872 7.71556 9.04594 7.98C8.78317 8.24444 8.65205 8.56194 8.65261 8.9325C8.65317 9.30306 8.78511 9.61972 9.04844 9.8825C9.31178 10.1453 9.62956 10.2764 10.0018 10.2758Z"
                            fill="#A74A4A" />
                    </svg>
                </div>
                <div class="text-main text-[10px] font-normal font-['Poppins']">{{ $location }}
                </div>
            </div>
        </div>
    </div>
    <div class="text-main text-sm font-medium font-['Poppins']">{{ $position }}</div>
    <div class="text-main text-sm font-medium font-['Poppins']">{{ $deadline }}</div>
    <div class="flex gap-32 justify-start items-center">
        <x-dynamic-component :component="'status.' . $status" />
    </div>
</div>
