@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Internship Management
@endsection

@section('content')
    <div class="container mx-auto min-h-screen font-sans">
        <div class="flex flex-col gap-6 lg:flex-row">
            <div class="space-y-6 lg:w-2/3">
                <x-internship-details.internship />

                <x-internship-details.role-desc />

                <x-internship-details.key-resp :responsibilities="[
                    [
                        'title' => 'UI/UX Design',
                        'items' => [
                            'Create visually appealing and intuitive user interfaces.',
                            'Collaborate with stakeholders and product managers to gather requirements and develop high-fidelity mockups.',
                            'Conduct research and usability testing to refine designs.'
                        ]
                    ],
                    [
                        'title' => 'Frontend Development (Optional)',
                        'items' => [
                            'Develop and maintain the frontend of web applications using Vue.js and Vuefity.',
                            'Work closely with backend developers to integrate APIs and backend services.'
                        ]
                    ]
                ]"/>

                {{-- Requirement dipanggil sebagai komponen --}}
                <x-internship-details.requirement :requirements="[
                    'Strong design skills are required.',
                    'Having frontend development skills is a plus.',
                    'Proficiency in design tools (e.g., Figma, Sketch, Adobe XD).',
                    'Basic understanding of HTML, CSS, and JavaScript.',
                    'Good communication and teamwork skills.',
                    'Ability to work independently and manage time effectively.'
                ]"/>
            </div>

            {{-- Bagian Kanan: Aksi & Statistik --}}
            <div class="space-y-6 lg:w-1/3">
                {{-- Aksi & Statistik dipanggil sebagai komponen --}}
                <x-internship-details.apply :people='1' />

                {{-- Eligibility dipanggil sebagai komponen --}}
                <x-internship-details.eligibility :eligibilities="[
                    'Mahasiswa aktif atau fresh graduate.',
                    'Memiliki passion di bidang UI/UX Design.',
                    'Mampu bekerja secara tim maupun individu.',
                    'Bersedia magang full-time (atau sesuai ketentuan).',
                    'Memiliki portofolio desain yang kuat (opsional, namun direkomendasikan).'
                ]" />
            </div>
        </div>
    </div>
@endsection
