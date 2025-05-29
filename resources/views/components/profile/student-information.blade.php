@props([
    'studentId' => '2341720233',
    'studyProgram' => 'Informatics Engineering',
    'semester' => '4',
    'email' => '2341720233@student.polinema.ac.id',
    'phone' => '+628113682704'
])

<div class="w-[650px] bg-white rounded-[30px] shadow-[0px_0px_19.899999618530273px_0px_rgba(0,0,0,0.10)] p-6 space-y-4">
    <h2 class="text-main text-2xl font-semibold font-['Poppins']">Information</h2>

    <div class="space-y-3">
        {{-- Student ID --}}
        <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/material-symbols_id-card-outline.png" class="w-[24px]" alt="" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Student ID</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $studentId }}</span>
        </div>

        {{-- Study Program --}}
        <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/solar_notebook-minimalistic-outline.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Study Program</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $studyProgram }}</span>
        </div>

        {{-- Semester --}}
        <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/uil_calender.png?updatedAt=1748260155255" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Semester</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $semester }}</span>
        </div>
    </div>

    <hr class="border-neutral-200">

    <div class="space-y-3">
        {{-- Email --}}
        <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/mdi_email-outline.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Email</span>
            </div>
            <a href="mailto:{{ $email }}" class="text-main text-sm font-medium font-['Poppins'] hover:underline">{{ $email }}</a>
        </div>

        {{-- Phone --}}
        <div class="flex justify-between items-center">
            <div class="flex gap-3 items-center">
                <img src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/profile/ci_phone.png" alt="" class="w-[24px]" loading="lazy">
                <span class="text-neutral-500 text-sm font-normal font-['Poppins']">Phone</span>
            </div>
            <span class="text-main text-sm font-medium font-['Poppins']">{{ $phone }}</span>
        </div>
    </div>
</div>
