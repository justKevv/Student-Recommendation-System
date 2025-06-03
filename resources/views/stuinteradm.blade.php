@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Student Internship Data
@endsection

@section('content')
  <div class="absolute">
    <x-stuinteradm.layout>
        <x-stuinteradm.card />
        <x-stuinteradm.sidebar />
    </x-stuinteradm.layout>
  </div>
  {{-- main file stuinteradm.blade.php --}}
<div class="p-8 mt-8 bg-white rounded-2xl">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Student Internship</h2>
        <div class="flex items-center space-x-4">
            {{-- Status Dropdown --}}
            <div class="relative">
                <button id="status-filter-button" class="px-4 py-2 w-36 text-left bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 flex justify-between items-center">
                    <span id="selected-status-text">Status</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="status-options" class="absolute z-20 mt-1 w-36 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 status-option" data-value="all">All</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 status-option" data-value="approved">Approved</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 status-option" data-value="pending">Pending</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 status-option" data-value="rejected">Rejected</a>
                </div>
            </div>

            {{-- Filters Button and Modal --}}
            <div class="relative">
                <button id="filters-button" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-gray-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h10a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2zM3 16a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1v-2z"></path></svg>
                    Filters
                </button>
                {{-- Filter Modal (Dropdown Style) --}}
                <div id="filter-modal" class="absolute z-20 right-0 mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-xl hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Filter</h3>
                            <button id="close-modal-button" class="text-gray-500 hover:text-gray-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        <div>
                            <h4 class="text-xs font-medium text-gray-400 mb-3">STUDY PROGRAMS</h4>
                            <div class="space-y-3">
                                @php
                                    $studyPrograms = [
                                        'D-IV Information Technology' => 'bg-yellow-100 border-yellow-300 text-yellow-800',
                                        'D-IV Business Information System' => 'bg-red-100 border-red-300 text-red-800',
                                        'D-II Website Software Development' => 'bg-green-100 border-green-300 text-green-800'
                                    ];
                                @endphp
                                @foreach($studyPrograms as $program => $colors)
                                    @php
                                        list($bgColor, $borderColor, $textColor) = explode(' ', $colors);
                                    @endphp
                                    <label class="flex items-center justify-between p-3 rounded-xl border {{ $borderColor }} {{ $bgColor }} cursor-pointer hover:opacity-80">
                                        <span class="text-sm font-medium {{ $textColor }}">{{ $program }}</span>
                                        <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600 rounded border-gray-400 focus:ring-gray-500 study-program-filter" value="{{ $program }}">
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        {{-- Add other filter sections here if needed --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl">
        <table class="min-w-full divide-y divide-gray-200" id="studentTable">
            <thead class="bg-white">
                <tr>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(0)">
                        No <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(1)">
                        NIM <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(2)">
                        Name <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(3)">
                        Study Program <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(4)">
                        Role <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(5)">
                        Status <span class="ml-1 text-xs"></span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none">
                        Action <span class="ml-1 text-xs"></span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                    $all_study_programs = ['D-IV Information Technology', 'D-IV Business Information System', 'D-II Website Software Development', 'D-IV Example Program'];
                    $all_names = ['Alexandra Grace', 'Nathaniel James', 'Sophia Marie', 'Benjamin Carter', 'Daniel Harper', 'Isabella Rose', 'Adam Smith', 'Michael Thomas', 'William Scott', 'Charlotte Avery'];
                    $all_nims = ['2341720259', '2345678467', '2345665573', '2345654333', '2345637326', '2345689545', '2345647322', '2345645211', '2345612414', '2345613567'];
                    $default_role = 'UI & UX';
                @endphp

                @for ($i = 0; $i < 10; $i++)
                    @php
                        $current_no = $i + 1;
                        $current_nim = $all_nims[$i % count($all_nims)];
                        $current_name = $all_names[$i % count($all_names)];
                        $current_study = $all_study_programs[$i % count($all_study_programs)];
                        $current_status = collect(['pending', 'approved', 'rejected'])->random();
                    @endphp
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $current_no }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $current_nim }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $current_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 study-program-cell">{{ $current_study }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $default_role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 status-cell">
                            @if($current_status == 'approved')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 status-text">
                                    Approved
                                </span>
                            @elseif($current_status == 'rejected')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 status-text">
                                    Rejected
                                </span>
                            @else {{-- pending --}}
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 status-text">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-lg text-xs font-medium hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Detail
                            </button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <nav class="flex justify-center mt-6">
        <ul class="flex space-x-2">
            <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
            <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">1</span></li>
            {{-- Add more pagination items if needed --}}
            <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
        </ul>
    </nav>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusFilterButton = document.getElementById('status-filter-button');
    const statusOptionsDiv = document.getElementById('status-options');
    const selectedStatusText = document.getElementById('selected-status-text');
    const statusOptionLinks = document.querySelectorAll('.status-option');

    const filtersButton = document.getElementById('filters-button');
    const filterModal = document.getElementById('filter-modal');
    const closeModalButton = document.getElementById('close-modal-button');
    const studyProgramCheckboxes = document.querySelectorAll('.study-program-filter');

    const table = document.getElementById('studentTable');
    const tableRows = table.querySelectorAll('tbody tr');

    let currentStatusFilter = 'all';
    let currentStudyProgramFilters = [];

    // Status Dropdown Logic
    statusFilterButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent document click from closing it immediately
        statusOptionsDiv.classList.toggle('hidden');
        filterModal.classList.add('hidden'); // Close filter modal if open
    });

    // Filter Modal (Dropdown Style) Logic
    filtersButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent document click from closing it immediately
        filterModal.classList.toggle('hidden');
        statusOptionsDiv.classList.add('hidden'); // Close status dropdown if open
    });

    closeModalButton.addEventListener('click', () => {
        filterModal.classList.add('hidden');
    });

    // Close dropdowns if clicked outside
    document.addEventListener('click', function(event) {
        // Close status dropdown
        if (!statusFilterButton.contains(event.target) && !statusOptionsDiv.contains(event.target)) {
            statusOptionsDiv.classList.add('hidden');
        }
        // Close filter modal
        if (!filtersButton.contains(event.target) && !filterModal.contains(event.target)) {
            filterModal.classList.add('hidden');
        }
    });


    statusOptionLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            currentStatusFilter = this.dataset.value;
            selectedStatusText.textContent = this.textContent;
            if (currentStatusFilter === 'all') {
                selectedStatusText.textContent = 'Status'; // Reset to placeholder
            }
            statusOptionsDiv.classList.add('hidden');
            applyFilters();
        });
    });

    studyProgramCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            currentStudyProgramFilters = Array.from(studyProgramCheckboxes)
                                            .filter(i => i.checked)
                                            .map(i => i.value);
            applyFilters(); // Apply filters immediately on change
        });
    });

    function applyFilters() {
        tableRows.forEach(row => {
            const statusCell = row.querySelector('.status-cell .status-text');
            const studyProgramCell = row.querySelector('.study-program-cell');

            let statusMatch = false;
            if (currentStatusFilter === 'all' || !statusCell) {
                statusMatch = true;
            } else {
                statusMatch = statusCell.textContent.trim().toLowerCase() === currentStatusFilter;
            }

            let studyProgramMatch = false;
            if (currentStudyProgramFilters.length === 0 || !studyProgramCell) {
                studyProgramMatch = true;
            } else {
                studyProgramMatch = currentStudyProgramFilters.includes(studyProgramCell.textContent.trim());
            }

            if (statusMatch && studyProgramMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Sorting Logic (remains the same)
    let sortDirection = {};
    window.sortTable = function(n) { // Make it globally accessible
        const tbody = table.tBodies[0];
        const rows = Array.from(tbody.rows);
        let dir = sortDirection[n] === "asc" ? "desc" : "asc";
        sortDirection = {}; // Reset other column sort directions
        sortDirection[n] = dir;

        table.querySelectorAll('thead th span').forEach(span => span.textContent = '');
        const currentHeaderSpan = table.querySelector(`thead th:nth-child(${n + 1}) span`);
        if (currentHeaderSpan) {
            currentHeaderSpan.textContent = dir === "asc" ? '▲' : '▼';
        }

        rows.sort((a, b) => {
            let xVal = a.cells[n].textContent.trim();
            let yVal = b.cells[n].textContent.trim();

            if (n === 0) { // 'No' column
                xVal = parseInt(xVal, 10);
                yVal = parseInt(yVal, 10);
            } else {
                const numX = parseFloat(xVal);
                const numY = parseFloat(yVal);
                if (!isNaN(numX) && !isNaN(numY) && xVal !== '' && yVal !== '') {
                    xVal = numX;
                    yVal = numY;
                } else {
                    xVal = xVal.toLowerCase();
                    yVal = yVal.toLowerCase();
                }
            }

            if (xVal < yVal) return dir === "asc" ? -1 : 1;
            if (xVal > yVal) return dir === "asc" ? 1 : -1;
            return 0;
        });

        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        rows.forEach(row => tbody.appendChild(row));
    }
});
</script>
@endsection