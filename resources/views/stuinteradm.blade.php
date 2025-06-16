@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Student Internship Data
@endsection

@section('content')
  <div class="absolute">
    <x-dashboard.layout :gap='"30px"'>
        <x-detail-application.card
            :location="$internship->location"
            :title="$internship->title"
            :company="$internship->company->name"
            :profile="$internship->company->profile_image ?? 'https://placehold.co/65x65'"
            :applied="count($internship->applications)"
            :due="$internship->remaining_time"
            :students="$students"
        />
        <x-detail-application.sidebar
            :title="count($internship->applications)"
            :student="'Students Applied'"
        />
    </x-dashboard.layout>
  </div>
<div class="p-8 mt-6 bg-white rounded-2xl">

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold">Student Internship</h2>
        <div class="justify-end space-x-3">
            <x-filter-item :title='"Study Program"' />
            <input id="search-bar" type="text"
                class="w-56 px-4 py-2 border rounded-full border-neutral-300 search-bar focus:outline-none focus:ring-2 focus:ring-neutral-300"
                placeholder="Search">
        </div>
    </div>
    <div class="overflow-x-auto bg-white rounded-xl">
        <table class="min-w-full divide-y divide-neutral-200" id="studentTable">
            <thead class="bg-white">
                <tr>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(0)">
                        No <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(1)">
                        NIM <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(2)">
                        Name <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(3)">
                        Study Program <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(4)">
                        Status <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700">
                        Action <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-neutral-200">
                @if(isset($students) && $students->count() > 0)
                    @foreach($students as $index => $student)
                        <x-detail-application.item
                            :no="$students->firstItem() + $loop->index"
                            :nim="$student->nim"
                            :name="$student->user->name"
                            :study="$student->study_program"
                            :status="$student->applications->first()->status ?? 'pending'"
                            :studentId="$student->id"
                            :internshipId="$internship->id"
                        />
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <nav class="flex justify-center mt-6">
        <ul class="flex space-x-2">
            @if ($students->onFirstPage())
                <li><span class="px-3 py-1 rounded-full cursor-not-allowed text-neutral-400">Prev</span></li>
            @else
                <li><a href="{{ $students->previousPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-neutral-700 hover:bg-gray-100">Prev</a></li>
            @endif

            @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                @if ($page == $students->currentPage())
                    <li><span class="px-3 py-1 rounded-full bg-neutral-900 text-main5">{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}" class="px-3 py-1 rounded-full cursor-pointer text-neutral-700 hover:bg-gray-100">{{ $page }}</a></li>
                @endif
            @endforeach

            @if ($students->hasMorePages())
                <li><a href="{{ $students->nextPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-neutral-700 hover:bg-gray-100">Next</a></li>
            @else
                <li><span class="px-3 py-1 rounded-full cursor-not-allowed text-neutral-400">Next</span></li>
            @endif
        </ul>
    </nav>
</div>

<script>
    document.querySelector('#search-bar').addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const table = document.getElementById('studentTable');
        const trs = table.querySelectorAll('tbody tr');
        trs.forEach(tr => {
            const rowText = tr.textContent.toLowerCase();
            tr.style.display = rowText.includes(filter) ? '' : 'none';
        });
    });

    let sortDirection = {};
    function sortTable(n) {
        const table = document.getElementById("studentTable");
        const tbody = table.tBodies[0];
        const rows = Array.from(tbody.rows);
        let dir = sortDirection[n] === "asc" ? "desc" : "asc";
        sortDirection[n] = dir;

        rows.sort((a, b) => {
            let x = a.cells[n].textContent.trim();
            let y = b.cells[n].textContent.trim();

            // Try to parse as date
            if (!isNaN(Date.parse(x)) && !isNaN(Date.parse(y))) {
                x = new Date(x);
                y = new Date(y);
            } else if (!isNaN(x) && !isNaN(y)) {
                // Try to parse as number
                x = Number(x);
                y = Number(y);
            }

            if (x < y) return dir === "asc" ? -1 : 1;
            if (x > y) return dir === "asc" ? 1 : -1;
            return 0;
        });

        // Remove old rows
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        // Append sorted rows
        rows.forEach(row => tbody.appendChild(row));
    }
</script>
@endsection
