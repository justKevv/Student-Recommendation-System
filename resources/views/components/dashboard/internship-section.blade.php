@props([
    'title' => 'Your Internship',
    'imgSource' => 'https://ik.imagekit.io/1qy6epne0l/next-step/assets/dashboard/dashboard_asset_1296379126?updatedAt=1748203880228',
    'acceptedApplication' => null,
    'histories',
])

<div class="w-full max-w-[1000px] h-64 relative">
    <h2 class="text-main text-xl font-medium font-['Poppins'] mb-4">
        {{ $title }}
    </h2>

    <div
        class="w-full h-52 bg-white/80 rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.05)] p-6">

        {{--
            The new logic:
            1. First, check if there is an active, accepted internship to display.
            2. If not, THEN check if there are past histories to show.
            3. If there are no histories either, show the final empty state.
        --}}

        @if ($acceptedApplication)
            {{-- This is the main card shown when a student has an accepted internship --}}
            <div class="w-full h-full inline-flex justify-start items-center gap-7">
                <div class="size-36 bg-black/20 rounded-[30px]">
                    {{-- You can place the internship/company image here --}}
                    {{-- <img src="{{ $acceptedApplication->internship->internship_picture_url }}" alt="Company Logo" class="object-cover w-full h-full rounded-[30px]"> --}}
                </div>
                <div class="inline-flex flex-col justify-start items-start gap-1">
                    <div class="inline-flex justify-center items-center gap-2.5">
                        <div class="flex justify-center items-center gap-[3px]">
                            {{-- Location Icon --}}
                            <div data-svg-wrapper class="relative">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.99928 17.13C9.86872 17.13 9.73817 17.1086 9.60761 17.0658C9.47705 17.0231 9.35705 16.9536 9.24761 16.8575C8.65483 16.3125 8.05372 15.7056 7.44428 15.0367C6.83539 14.3683 6.28261 13.6758 5.78594 12.9592C5.28928 12.2425 4.8815 11.5111 4.56261 10.765C4.24372 10.0189 4.08483 9.29056 4.08594 8.58C4.08594 6.81722 4.65983 5.36333 5.80761 4.21833C6.95594 3.07278 8.35317 2.5 9.99928 2.5C11.6454 2.5 13.0426 3.07278 14.1909 4.21833C15.3387 5.36333 15.9126 6.81722 15.9126 8.58C15.9126 9.29056 15.7537 10.0164 15.4359 10.7575C15.1182 11.4981 14.7132 12.2292 14.2209 12.9508C13.7293 13.6731 13.179 14.3658 12.5701 15.0292C11.9612 15.6925 11.3598 16.2967 10.7659 16.8417C10.6598 16.9378 10.5393 17.01 10.4043 17.0583C10.2687 17.1061 10.1334 17.13 9.99844 17.13M10.0018 9.77583C10.3723 9.77583 10.689 9.64361 10.9518 9.37917C11.214 9.11528 11.3451 8.79778 11.3451 8.42667C11.3451 8.05556 11.2129 7.73889 10.9484 7.47667C10.684 7.21444 10.3665 7.08333 9.99594 7.08333C9.62539 7.08333 9.30872 7.21556 9.04594 7.48C8.78317 7.74444 8.65205 8.06194 8.65261 8.4325C8.65317 8.80306 8.78511 9.11972 9.04844 9.3825C9.31178 9.64528 9.62956 9.77639 10.0018 9.77583Z"
                                        fill="#A74A4A" />
                                </svg>
                            </div>
                            <div class="text-zinc-800 text-sm font-normal font-['Poppins']">
                                {{ $acceptedApplication->internship->company->city }}</div>
                        </div>
                        <div data-svg-wrapper>
                            <svg width="2" height="22" viewBox="0 0 2 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L0.999999 21" stroke="#CACACA" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="flex justify-start items-center gap-[3px]">
                           {{-- Type Icon --}}
                            <div data-svg-wrapper class="relative">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.2033 2.02339C11.7658 1.89438 11.3163 1.81061 10.8617 1.77339C9.85603 1.65443 8.83682 1.7337 7.86167 2.00673L7.80334 2.02339C6.05484 2.50352 4.51249 3.54476 3.4135 4.98698C2.31451 6.4292 1.71976 8.19252 1.7207 10.0057C1.72165 11.819 2.31825 13.5817 3.41874 15.0227C4.51923 16.4638 6.06267 17.5034 7.81167 17.9817C8.45176 18.163 9.11312 18.2583 9.77834 18.2651C9.85255 18.2784 9.92796 18.284 10.0033 18.2817C10.7442 18.2826 11.4816 18.1817 12.195 17.9817C13.9425 17.5018 15.4842 16.4615 16.5832 15.0206C17.6823 13.5797 18.2781 11.8179 18.279 10.0057C18.28 8.19353 17.6861 6.4311 16.5885 4.98908C15.4909 3.54706 13.9503 2.50517 12.2033 2.02339ZM11.9783 2.82339C13.0574 3.1219 14.0552 3.65976 14.8978 4.397C15.7403 5.13423 16.4059 6.05188 16.845 7.08173H13.295C12.8707 5.4459 12.0911 3.92368 11.0117 2.62339C11.3384 2.66608 11.6615 2.73293 11.9783 2.82339ZM10.0033 2.74839C11.1413 3.98195 11.9722 5.46662 12.4283 7.08173H7.56167C8.01548 5.46254 8.85304 3.97666 10.0033 2.75006V2.74839ZM12.6367 7.91506C12.9032 9.29397 12.9032 10.7112 12.6367 12.0901H7.37C7.22905 11.4046 7.15923 10.7065 7.16167 10.0067C7.15984 9.30424 7.22964 8.60339 7.37 7.91506H12.6367ZM7.97 2.84006L8.02834 2.82339C8.34601 2.73838 8.66893 2.67435 8.995 2.63173C7.90879 3.92621 7.12579 5.44721 6.70334 7.08339H3.16584C3.60333 6.06507 4.26108 5.15636 5.09177 4.42265C5.92246 3.68893 6.90544 3.14844 7.97 2.84006ZM2.55334 10.0067C2.55335 9.29818 2.65724 8.59347 2.86167 7.91506H6.52C6.39335 8.6051 6.32921 9.30516 6.32834 10.0067C6.32971 10.7055 6.39385 11.4028 6.52 12.0901H2.86167C2.65686 11.4146 2.55296 10.7126 2.55334 10.0067ZM8.02834 17.1817C6.94827 16.8854 5.94932 16.3484 5.10646 15.6109C4.26359 14.8734 3.5987 13.9546 3.16167 12.9234H6.695C7.12147 14.5634 7.91027 16.0869 9.00334 17.3817C8.67381 17.3394 8.3479 17.2726 8.02834 17.1817ZM7.56167 12.9234H12.4283C11.9781 14.5434 11.1466 16.0321 10.0033 17.2651C8.86075 16.029 8.02442 14.5418 7.56167 12.9234ZM11.9783 17.1817C11.6569 17.2645 11.3315 17.3313 11.0033 17.3817C12.0858 16.0822 12.8682 14.5599 13.295 12.9234H16.845C16.4069 13.9539 15.7417 14.8721 14.899 15.6095C14.0563 16.3469 13.0579 16.8843 11.9783 17.1817ZM13.4783 12.0901C13.7369 10.7104 13.7369 9.29472 13.4783 7.91506H17.1367C17.3448 8.59265 17.4487 9.29791 17.445 10.0067C17.4469 10.7121 17.3458 11.4139 17.145 12.0901H13.4783Z"
                                        fill="#42538E" />
                                </svg>
                            </div>
                            <div class="text-zinc-800 text-sm font-normal font-['Poppins']">
                                {{ Str::ucfirst($acceptedApplication->internship->type) }}
                            </div>
                        </div>
                    </div>
                    <div class="self-stretch text-black text-xl font-medium font-['Poppins']">
                        {{ Str::ucfirst($acceptedApplication->internship->title) }}</div>
                    <div class="self-stretch text-zinc-800 text-sm font-normal font-['Poppins']">
                        {{ Str::ucfirst($acceptedApplication->internship->company->name) }}</div>
                    <div class="self-stretch h-7 text-zinc-800 text-base font-normal font-['Poppins']">
                        Supervisor: {{ Str::ucfirst($acceptedApplication->supervisor->user->name) }}</div>
                </div>
            </div>
        @else
            @if ($histories->isEmpty())
                <div class="flex flex-col justify-center items-center h-full text-center">
                    <div class="mb-2">
                        <img class="w-[185px]" src="{{ $imgSource }}" alt="NO INTERNSHIP" loading="lazy">
                    </div>
                    <h3 class="text-gray-600 text-lg font-medium font-['Poppins'] mb-2">No Active Internships</h3>
                    <p class="text-gray-500 text-sm font-['Poppins']">You haven't applied to any internships yet. Start
                        exploring opportunities!</p>
                </div>
            @else
                <div class="space-y-5">
                    @foreach ($histories as $history)
                        <x-dashboard.history-pill status="{{ $history->status }}"
                            companyName="{{ $history->internship->company->name }}"
                            location="{{ $history->internship->location }}"
                            position="{{ $history->internship->title }}"
                            deadline="{{ $history->created_at->format('M j, Y') }}" />
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
