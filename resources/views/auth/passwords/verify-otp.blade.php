@extends('auth.passwords.layout.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="w-[1066px] h-[713px] left-0 top-0 absolute bg-white rounded-[30px]"></div>
    <img class="size-11 right-[90px] top-[95px] absolute z-2"
        src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/Yellow_key.png?updatedAt=1747989541782" />
    <div class="w-110 h-[713px] left-0 top-0 absolute bg-main rounded-tl-[30px] rounded-bl-[30px]"></div>
    <div class="left-[127px] top-[92px] absolute justify-start text-white text-2xl font-normal font-['Poppins']">NextStep
    </div>
    <div data-svg-wrapper class="left-[55px] top-[85px] absolute">
        <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="22.5" cy="22.5" r="22.5" fill="#5A5F6B" />
        </svg>
    </div>
    <div data-svg-wrapper class="left-[78px] top-[105px] absolute">
        <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="14.5" cy="14.5" r="14.5" fill="#DEE2F2" />
        </svg>
    </div>
    <div class="left-[533px] top-[104px] absolute justify-start text-main text-4xl font-semibold font-['Poppins']">Verify
        OTP Email</div>
    <div class="left-[533px] top-[174px] absolute justify-start text-neutral-500 text-base font-normal font-['Poppins']">
        Check your email for the OTP code to continue</div>

    <form action="{{ route('otp.verify') }}" method="post">
        @csrf
        <div class="size- left-[533px] top-[255px] absolute inline-flex justify-start items-center gap-2.5">
            <input type="text" name="otp1" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                oninput="moveToNext(this, 'otp2')" />
            <input type="text" name="otp2" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                oninput="moveToNext(this, 'otp3')" onkeydown="moveToPrev(event, 'otp1')" />
            <input type="text" name="otp3" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                oninput="moveToNext(this, 'otp4')" onkeydown="moveToPrev(event, 'otp2')" />
            <input type="text" name="otp4" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                oninput="moveToNext(this, 'otp5')" onkeydown="moveToPrev(event, 'otp3')" />
            <input type="text" name="otp5" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                oninput="moveToNext(this, 'otp6')" onkeydown="moveToPrev(event, 'otp4')" />
            <input type="text" name="otp6" maxlength="1"
                class="size-16 text-center rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-zinc-300 text-main text-xl font-semibold font-['Poppins'] focus:outline-yellow-500"
                onkeydown="moveToPrev(event, 'otp5')" />
        </div>

        <button type="submit"
            class="cursor-pointer w-110 h-12 px-48 py-5 left-[533px] top-[362px] absolute bg-yellow-500 rounded-[50px] inline-flex justify-center items-center gap-2.5 text-white text-base font-semibold font-['Poppins'] whitespace-nowrap">Verify
            OTP</button>
    </form>
    <div class="size- left-[533px] top-[434px] absolute inline-flex justify-center items-center">
        <div data-svg-wrapper class="relative">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 7L9 12L14 17" stroke="#757575" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
        <div class="size- flex justify-center items-center gap-2.5"> <a href="{{ route('login') }}"
                class="justify-start text-neutral-500 text-sm font-normal font-['Poppins']">Back to Login</a>
        </div>
    </div>

    <script>
        function moveToNext(current, nextFieldId) {
            if (current.value.length >= current.maxLength) {
                const nextField = document.querySelector(`input[name="${nextFieldId}"]`);
                if (nextField) {
                    nextField.focus();
                }
            }
        }

        function moveToPrev(event, prevFieldId) {
            if (event.key === 'Backspace' && event.target.value === '') {
                const prevField = document.querySelector(`input[name="${prevFieldId}"]`);
                if (prevField) {
                    prevField.focus();
                }
            }
        }

        // Only allow numbers
        document.querySelectorAll('input[name^="otp"]').forEach(input => {
            input.addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@endsection
