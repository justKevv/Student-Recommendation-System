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
        <x-detail-application.card />
        <x-detail-application.sidebar />
    </x-dashboard.layout>
  </div>
<div class="p-8 mt-6 bg-white rounded-2xl">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Student Internship</h2>
        <div class="justify-end space-x-3">
            <x-filter-item :title='"Study Program"' />
            <x-filter-item :title='"Status"' />
            <x-filter-item :title='"Role"' />
            <input id="search-bar" type="text"
                class="px-4 py-2 w-56 rounded-full border border-neutral-300 search-bar focus:outline-none focus:ring-2 focus:ring-neutral-300"
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
                        Role <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700"
                        onclick="sortTable(5)">
                        Status <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-xs font-bold text-left uppercase cursor-pointer select-none text-neutral-700">
                        Action <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-neutral-200">
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
                        $current_status = collect(['pending', 'accepted', 'rejected'])->random();
                    @endphp
                    <x-detail-application.item
                        :no="$current_no"
                        :nim="$current_nim"
                        :name="$current_name"
                        :study="$current_study"
                        :role="$default_role"
                        :status="$current_status"
                    />
                @endfor
            </tbody>
        </table>
    </div>
    <nav class="flex justify-center mt-6">
        <ul class="flex space-x-2">
            <li><span class="px-3 py-1 rounded-full cursor-not-allowed text-neutral-400">Prev</span></li>
            <li><span class="px-3 py-1 rounded-full bg-neutral-900 text-main5">1</span></li>
            <li><span class="px-3 py-1 rounded-full cursor-pointer text-neutral-700">2</span></li>
            <li><span class="px-3 py-1 rounded-full cursor-pointer text-neutral-700">3</span></li>
            <li><span class="px-3 py-1 rounded-full cursor-not-allowed text-neutral-400">Next</span></li>
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
