@extends('auth.passwords.layout.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="left-[528px] top-[95px] absolute justify-start text-main text-4xl font-semibold font-['Poppins']">Enter new
        Password</div>
    <div class="left-[528px] top-[165px] absolute justify-start text-neutral-500 text-base font-normal font-['Poppins']">
        Enter the email address associated <br />with your account.</div>
    <form action="{{ route('password.update') }}" method="post">
        <div class="h-44 left-[528px] top-[270px] absolute inline-flex flex-col justify-center items-start gap-6">
            <div class="justify-start text-zinc-800 text-sm font-medium font-['Poppins']">Password</div>
            <input type="password" placeholder="Enter new password"
                class="w-96 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3 justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] focus:outline-yellow-500"></input>
            <div class="justify-start text-zinc-800 text-sm font-medium font-['Poppins']">Password Confirmation</div>
            <input type="password" placeholder="Confirm your new password"
                class="w-96 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3 justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] focus:outline-yellow-500"></input>
        </div>
        <button type="submit"
            class="cursor-pointer w-96 h-12 px-48 py-5 left-[533px] top-[487px] absolute bg-yellow-500 rounded-[50px] inline-flex justify-center items-center gap-2.5 text-white text-base font-semibold font-['Poppins'] whitespace-nowrap">Reset
            Password</button>
    </form>
@endsection
