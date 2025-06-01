<div id="notifications-popover"
    class="absolute hidden right-0 mt-3 w-80 p-4 bg-main4 rounded-[29px] shadow-[0px_0px_15px_0px_rgba(0,0,0,0.08)] z-10 sm:w-96 md:w-[400px]">
    <h3 class="mb-4 text-xl font-semibold text-main">Notifications</h3>

    @php
        $notifications = [
            [
                'profileImage' => 'https://placehold.co/50x50',
                'message' => 'Yuma Akhunza not completed the report logs',
                'time' => '1 minutes ago',
            ],
            [
                'profileImage' => 'https://placehold.co/50x50',
                'message' => 'Yuma Akhunza not completed the report logs',
                'time' => '1 minutes ago',
            ],
            [
                'profileImage' => 'https://placehold.co/50x50',
                'message' => 'Yuma Akhunza not completed the report logs',
                'time' => '1 minutes ago',
            ],
        ];
    @endphp

    <div class="flex flex-col gap-3">
        @foreach ($notifications as $notification)
            <div class="bg-white rounded-[10px] p-3 flex gap-3 items-center shadow-[0px_0px_15px_0px_rgba(0,0,0,0.08)]">
                <img class="flex-shrink-0 w-10 h-10 rounded-full" src="{{ $notification['profileImage'] }}"
                    alt="Profile">
                <div>
                    <p class="text-black text-sm font-medium font-['Poppins'] leading-snug">
                        {{ $notification['message'] }}
                    </p>
                    <p class="text-neutral-500 text-xs font-normal font-['Poppins'] leading-tight mt-1">
                        {{ $notification['time'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
