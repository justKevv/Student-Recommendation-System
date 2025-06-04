<div class="container mx-auto min-h-screen font-inter">
    <h1 class="mb-8 text-3xl font-bold text-gray-900">My Profile</h1>

    {{-- Top Profile Card (using the component) --}}
    <div class="mb-8">
        <x-profup.user-profile
            name="{{ $user->name }}"
            role="Supervisor"
            location="Malang, Indonesia"
            avatarImage="{{ $user->profile_picture }}"
        />
    </div>

    {{-- Personal Information Section --}}
    <div class="mb-8">
        <x-profup.personal-information
            firstName="{{ $user->first_name }}"
            lastName="{{ $user->last_name  }}"
            supervisorId="{{ $user->supervisor->nidn }}"
            emailAddress="{{ $user->email  }}"
            phoneNumber="{{ $user->phone   }}"
            major="Information Technology"
        />
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        <x-profup.expertise-area
            :expertiseAreas="$user->supervisor->expertise_areas ?? []"
        />
        <x-profup.research-interest
            :researchInterests="$user->supervisor->research_interests ?? [] "
        />
    </div>
</div>

