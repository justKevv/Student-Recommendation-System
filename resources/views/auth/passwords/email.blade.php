@extends('auth.passwords.layout.app')
@section('title')
    Forgot Password
@endsection
@section('content')
    <x-slot:title>Forgot Password</x-slot:title>
    <div class="left-[533px] top-[95px] absolute justify-start text-black text-4xl font-semibold font-['Poppins']">
        Forgot Password?</div>
    <img class="size-11 right-[60px] top-[90px] absolute z-2"
        src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/Yellow_key.png?updatedAt=1747989541782" />
    <div class="left-[533px] top-[165px] absolute justify-start text-neutral-500 text-base font-normal font-['Poppins']">
        Enter the email address associated <br />with your account.</div>
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="size- left-[533px] top-[270px] absolute inline-flex flex-col justify-center items-start gap-1">
            <div class="justify-start text-main text-sm font-medium font-['Poppins']">Email</div>

            <input type="email" name="email" placeholder="Enter Email Address" class=" w-110 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-offset-[-1px] outline-gray-200 inline-flex items-center gap-3 justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] focus:outline-yellow-500" />
        </div>
        <button type="submit"
            class="cursor-pointer w-110 h-12 px-48 py-5 left-[533px] top-[377px] absolute bg-yellow-500 rounded-[50px] inline-flex justify-center items-center gap-2.5 text-white text-base font-semibold font-['Poppins'] whitespace-nowrap">Reset
            Password</button>
    </form>
    <div class="size- left-[533px] top-[451px] absolute inline-flex justify-center items-center">
        <div data-svg-wrapper class="relative">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 7L9 12L14 17" stroke="#757575" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
        <div class="flex gap-2.5 justify-center items-center size-">
            <a href="{{ route('login') }}" class="justify-start text-neutral-500 text-sm font-normal font-['Poppins']">Back
                to Login</a>
        </div>
    </div>
    <div class="w-110 h-[713px] left-0 top-0 absolute bg-main rounded-tl-[30px] rounded-bl-[30px]"></div>
    <div class="left-[127px] top-[92px] absolute justify-start text-white text-2xl font-normal font-['Poppins']">
        NextStep</div>
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
@endsection
