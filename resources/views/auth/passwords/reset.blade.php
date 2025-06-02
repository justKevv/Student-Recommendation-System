@extends('auth.passwords.layout.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="left-[528px] top-[95px] absolute justify-start text-main text-4xl font-semibold font-['Poppins']">Enter new
        Password</div>
    <div class="left-[528px] top-[165px] absolute justify-start text-neutral-500 text-base font-normal font-['Poppins']">
        Create a new password for your account.</div>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="left-[528px] top-[220px] absolute w-96">
            @foreach ($errors->all() as $error)
                <div class="mb-2 text-sm text-red-500">{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="h-44 left-[528px] top-[270px] absolute inline-flex flex-col justify-center items-start gap-6">
            <div class="justify-start text-zinc-800 text-sm font-medium font-['Poppins']">Password</div>
            <input type="password" name="password" placeholder="Enter new password" required
                class="w-96 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3 justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] focus:outline-yellow-500 @error('password') outline-red-500 @enderror">

            <div class="justify-start text-zinc-800 text-sm font-medium font-['Poppins']">Password Confirmation</div>
            <input type="password" name="password_confirmation" placeholder="Confirm your new password" required
                class="w-96 px-3.5 py-3 rounded-[10px] shadow-[0px_2px_9.100000381469727px_0px_rgba(0,0,0,0.25)] outline outline-1 outline-offset-[-1px] outline-gray-200 inline-flex justify-start items-center gap-3 justify-start text-main placeholder-neutral-400 text-sm font-normal font-['Poppins'] focus:outline-yellow-500">
        </div>

        <button type="submit"
            class="cursor-pointer w-96 h-12 px-48 py-5 left-[533px] top-[487px] absolute bg-yellow-500 rounded-[50px] inline-flex justify-center items-center gap-2.5 text-white text-base font-semibold font-['Poppins'] whitespace-nowrap hover:bg-yellow-600 transition-colors">Reset
            Password</button>
    </form>
@endsection
