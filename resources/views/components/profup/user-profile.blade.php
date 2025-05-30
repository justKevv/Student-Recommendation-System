{{-- resources/views/components/profup/user-profile.blade.php --}}
@props([
    'name' => 'Adevian Fairuz',
    'role' => 'Supervisor',
    'location' => 'Malang, Indonesia',
    'avatarImage' => 'https://placehold.co/96x96' // This should be the path to the user's profile image
])

{{-- Top Profile Card --}}
<div class="bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 flex items-center gap-6 mb-8">
    <img class="w-24 h-24 rounded-full object-cover" src="{{ $avatarImage }}" alt="Profile Picture" class="w-[80px] h-[80px] rounded-full object-cover">
    <div>
        <h1 class="text-main text-2xl font-semibold font-['Poppins']">{{ $name }}</h1>
        <p class="text-neutral-500 text-base font-normal font-['Poppins']">{{ $role }}</p>
        <p class="text-neutral-500 text-base font-normal font-['Poppins']">{{ $location }}</p>
    </div>
</div>
