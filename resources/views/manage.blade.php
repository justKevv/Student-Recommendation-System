

@extends('layout.app')

@section('title')
    Manage User
@endsection

@section('content')
<div class="flex justify-between">
    <x-admin.toggle-table :tab_1='"user"' :tab_2='"company"'/>
    <x-admin.add-data :data='"user"' :tab1='"user"' :tab2='"company"'/>
</div>

@if(session('admin_password'))
<div class="p-4 mt-4 rounded-lg border" style="background-color: var(--color-approved); border-color: #9BB5B0; color: #2D5A52;">
    <h3 class="mb-2 text-lg font-bold">Admin Account Created Successfully!</h3>
    <p><strong>Email:</strong> {{ session('admin_email') }}</p>
    <p><strong>Password:</strong> <span class="px-2 py-1 font-mono bg-white rounded border">{{ session('admin_password') }}</span></p>
    <p class="mt-2 text-sm" style="color: #1F4A42;">⚠️ Please save these credentials securely. The password will not be shown again.</p>
</div>
@endif

<div class="p-8 mt-2 bg-white rounded-2xl">
    <div class="flex justify-between items-center mb-8">
        <h2 id="data-title" class="text-2xl font-bold">User Data</h2>
        <div class="justify-end space-x-3">
            <x-filter-item :title='"Location"' />
            <x-filter-item :title='"Work Type"' />
            <x-filter-item :title='"Category"' />
            <input id="search-bar" type="text"
                class="px-4 py-2 w-56 rounded-full border border-gray-300 search-bar focus:outline-none focus:ring-2 focus:ring-gray-300"
                placeholder="Search">
        </div>
    </div>


    <div id="user-content" class="w-full">
        <div class="overflow-x-auto bg-white rounded-xl">
            <table class="min-w-full divide-y divide-gray-200" id="userTable">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(0, 'userTable')">
                            No <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(1, 'userTable')">
                            Name <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(2, 'userTable')">
                            Email <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(3, 'userTable')">
                            Phone <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(4, 'userTable')">
                            Role <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-center uppercase text-main">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user_individual)
                        <x-admin.user.item no="{{ $users->firstItem() + $loop->index }}" name="{{ $user_individual->name }}" email="{{ $user_individual->email }}" phone="{{ $user_individual->phone }}" role="{{ $user_individual->role }}" :user="$user_individual"/>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav class="flex justify-center mt-6">
            <ul class="flex space-x-2">
                @if ($users->onFirstPage())
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                @else
                    <li><a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Prev</a></li>
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    @if ($page == $users->currentPage())
                        <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($users->hasMorePages())
                    <li><a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Next</a></li>
                @else
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>

    <div id="company-content" class="hidden w-full">
        <div class="overflow-x-auto bg-white rounded-xl">
            <table class="min-w-full divide-y divide-gray-200" id="companyTable">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(0, 'companyTable')">
                            No <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(1, 'companyTable')">
                            Company Name <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(2, 'companyTable')">
                            Industry <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(3, 'companyTable')">
                            City <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-left uppercase cursor-pointer select-none text-main"
                            onclick="sortTable(4, 'companyTable')">
                            Email <span class="ml-1 text-sm">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-sm font-bold text-center uppercase text-main">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($companies as $company)
                        <x-admin.company.item
                            no="{{ $companies->firstItem() + $loop->index }}"
                            name="{{ $company->name }}"
                            industry_field="{{ Str::title(str_replace('_', ' ', $company->industry_field)) }}" city="{{ $company->city }}" email="{{ $company->email }}" :company="$company"/>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav class="flex justify-center mt-6">
            <ul class="flex space-x-2">
                @if ($companies->onFirstPage())
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                @else
                    <li><a href="{{ $companies->previousPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Prev</a></li>
                @endif

                @foreach ($companies->getUrlRange(1, $companies->lastPage()) as $page => $url)
                    @if ($page == $companies->currentPage())
                        <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($companies->hasMorePages())
                    <li><a href="{{ $companies->nextPageUrl() }}" class="px-3 py-1 rounded-full cursor-pointer text-main hover:bg-gray-100">Next</a></li>
                @else
                    <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataTitle = document.getElementById('data-title');
            const userTab = document.getElementById('user-tab-link');
            const companyTab = document.getElementById('company-tab-link');

            // Function to update title based on active tab
            function updateTitle() {
                if (userTab && userTab.classList.contains('text-yellowgoon')) {
                    dataTitle.textContent = 'User Data';
                } else if (companyTab && companyTab.classList.contains('text-yellowgoon')) {
                    dataTitle.textContent = 'Company Data';
                }
            }

            // Update title on tab clicks
            if (userTab) {
                userTab.addEventListener('click', function() {
                    setTimeout(updateTitle, 100); // Small delay to ensure classes are updated
                });
            }

            if (companyTab) {
                companyTab.addEventListener('click', function() {
                    setTimeout(updateTitle, 100); // Small delay to ensure classes are updated
                });
            }

            // Initial title update
            updateTitle();
        });

        document.querySelector('#search-bar').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            const userTable = document.getElementById('userTable');
            const companyTable = document.getElementById('companyTable');

            // Search in user table
            const userTrs = userTable.querySelectorAll('tbody tr');
            userTrs.forEach(tr => {
                const rowText = tr.textContent.toLowerCase();
                tr.style.display = rowText.includes(filter) ? '' : 'none';
            });

            // Search in company table
            const companyTrs = companyTable.querySelectorAll('tbody tr');
            companyTrs.forEach(tr => {
                const rowText = tr.textContent.toLowerCase();
                tr.style.display = rowText.includes(filter) ? '' : 'none';
            });
        });

        let sortDirection = {};
        function sortTable(n, tableId) {
            const table = document.getElementById(tableId);
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.rows);
            let dir = sortDirection[tableId + '_' + n] === "asc" ? "desc" : "asc";
            sortDirection[tableId + '_' + n] = dir;

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
</div>
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
