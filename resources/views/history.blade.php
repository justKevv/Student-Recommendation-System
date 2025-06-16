@extends('layout.app')

@section('title')
    History
@endsection

@section('content')
    <div class="p-8 mt-2 bg-white rounded-2xl">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">History</h2>
            <div class="justify-end space-x-3">
                <x-filter-item :title='"Location"' />
                <x-filter-item :title='"Work Type"' />
                <x-filter-item :title='"Category"' />
                <input id="search-bar" type="text"
                    class="px-4 py-2 w-56 rounded-full border border-gray-300 search-bar focus:outline-none focus:ring-2 focus:ring-gray-300"
                    placeholder="Search">
            </div>
        </div>
        <div class="overflow-x-auto bg-white rounded-xl">
            <table class="min-w-full divide-y divide-gray-200" id="historyTable">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(0)">
                            No <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(1)">
                            Company Name <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(2)">
                            Role <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(3)">
                            Location <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(4)">
                            Work Type <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(5)">
                            Date <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(6)">
                            Status <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($histories as $history)
                        <x-history.item
                            no="{{ $histories->firstItem() + $loop->index }}"
                            status="{{ $history->status }}"
                            company="{{ $history->internship->company->name }}"
                            position="{{ $history->internship->title }}"
                            location="{{ $history->internship->location  }}"
                            type="{{ $history->internship->type }}"
                            date="{{ $history->created_at->format('M j, Y') }}"
                            href="{{ route('detail.company', Str::slug($history->internship->company->name)) }}" />
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav class="flex justify-center mt-6">
            <ul class="flex space-x-2">
                @if ($histories->onFirstPage())
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                @else
                    <li><a href="{{ $histories->previousPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Prev</a></li>
                @endif

                @foreach ($histories->getUrlRange(1, $histories->lastPage()) as $page => $url)
                    @if ($page == $histories->currentPage())
                        <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($histories->hasMorePages())
                    <li><a href="{{ $histories->nextPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Next</a></li>
                @else
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>

    <script>
        document.querySelector('#search-bar').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const table = document.getElementById('historyTable');
            const trs = table.querySelectorAll('tbody tr');
            trs.forEach(tr => {
                const rowText = tr.textContent.toLowerCase();
                tr.style.display = rowText.includes(filter) ? '' : 'none';
            });
        });

        let sortDirection = {};
        function sortTable(n) {
            const table = document.getElementById("historyTable");
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
