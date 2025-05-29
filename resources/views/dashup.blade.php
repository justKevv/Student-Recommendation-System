@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Dashboard
@endsection

@section('content')
<div class="absolute">
    <x-dashup.layout>
        <x-dashup.hero-banner/>

        <x-dashup.sidebar />
    </x-dashup.layout>
</div>
<div>
    {{-- START: PHP block for dummy student data and pagination simulation --}}
{{-- In a real application, this data would come from your Laravel Controller --}}
@php
    // Helper function to create dummy student objects (mimicking Eloquent models)
    function createDummyStudent($name, $role, $completed, $total, $profileImage = null) {
        $student = new stdClass(); // Create a generic object
        $student->name = $name;
        $student->role = $role;
        $student->completed_tasks = $completed; // Matches DB column name
        $student->total_tasks = $total;     // Matches DB column name
        $student->profile_image = $profileImage;
        return $student;
    }

    $allStudentsDummy = [
        createDummyStudent('Yuma Akhunza', 'UI/UX Designer', 4, 7, 'https://placehold.co/50x50/ff0000/ffffff?text=Yuma'),
        createDummyStudent('Jane Doe', 'Frontend Developer', 6, 7, 'https://placehold.co/50x50/00ff00/ffffff?text=Jane'),
        createDummyStudent('John Smith', 'Backend Developer', 3, 7, 'https://placehold.co/50x50/0000ff/ffffff?text=John'),
        createDummyStudent('Alice Wonderland', 'DevOps Engineer', 7, 7, 'https://placehold.co/50x50/ffff00/000000?text=Alice'),
        createDummyStudent('Bob The Builder', 'Project Manager', 2, 7, 'https://placehold.co/50x50/00ffff/000000?text=Bob'),
        createDummyStudent('Charlie Chaplin', 'QA Tester', 5, 7, 'https://placehold.co/50x50/ff00ff/ffffff?text=Charlie'),

    ];

    // Simulate Pagination for dummy data
    $perPage = 10; // Number of items per page
    $currentPage = request()->get('page', 1); // Get page from URL, default to 1
    $offset = ($currentPage - 1) * $perPage;
    $students = array_slice($allStudentsDummy, $offset, $perPage); // The array of students for the current page

    $totalStudents = count($allStudentsDummy);
    $totalPages = ceil($totalStudents / $perPage);

    // Ensure currentPage and totalPages are integers for component props
    $currentPage = (int)$currentPage;
    $totalPages = (int)$totalPages;
    $selectedEntriesPerPage = (int)$perPage;
@endphp
{{-- END: PHP block for dummy student data --}}

<div>
    <x-dashup.student
        :students="$students"
        :currentPage="$currentPage"
        :totalPages="$totalPages"
        :selectedEntriesPerPage="$selectedEntriesPerPage"
    />
</div>
</div>


@endsection