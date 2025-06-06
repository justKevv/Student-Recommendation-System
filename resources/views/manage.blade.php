@extends('layout.app', [
    'userName' => 'Yuma Akhansa',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Manage User
@endsection

@section('content')
<x-admin.toggle-table :tab_1='"user"' :tab_2='"company"'/>

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
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(0, 'userTable')">
                            No <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(1, 'userTable')">
                            Name <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(2, 'userTable')">
                            Email <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(3, 'userTable')">
                            Role <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-700 uppercase">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <x-admin.user.item no="1" name="Alexandra Grace" email="alexandra@gmail.com" role="Student"/>
                    <x-admin.user.item no="2" name="Nathaniel James" email="nath.james@yahoo.com" role="Admin"/>
                    <x-admin.user.item no="3" name="Sophia Marie" email="sophiamar88@gmail.com" role="Student"/>
                    <x-admin.user.item no="4" name="Benjamin Carter" email="benjamincarter@gmail.com" role="Student"/>
                    <x-admin.user.item no="5" name="Daniel Harper" email="danielharper77@gmail.com" role="Student"/>
                    <x-admin.user.item no="6" name="Isabella Rose" email="isarose@gmail.com" role="Student"/>
                    <x-admin.user.item no="7" name="Adam Smith" email="adamsmith@gmail.com" role="Student"/>
                    <x-admin.user.item no="8" name="Michael Thomas" email="michaelthomas10@gmail.com" role="Student"/>
                    <x-admin.user.item no="9" name="William Scott" email="williescott@gmail.com" role="Supervisor"/>
                    <x-admin.user.item no="10" name="Charlotte Avery" email="charlotteavery@gmail.com" role="Supervisor"/>
                    <x-admin.user.item no="11" name="Maria Alexis" email="alexismaria@gmail.com" role="Supervisor"/>
                    <x-admin.user.item no="12" name="Sinthia raxy" email="exaraxysinthia@gmail.com" role="Admin"/>
                    <x-admin.user.item no="13" name="Juno martens" email="junomartens71@gmail.com" role="Admin"/>
                </tbody>
            </table>
        </div>
        <nav class="flex justify-center mt-6">
            <ul class="flex space-x-2">
                <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">1</span></li>
                <li><span class="px-3 py-1 text-gray-700 rounded-full cursor-pointer">2</span></li>
                <li><span class="px-3 py-1 text-gray-700 rounded-full cursor-pointer">3</span></li>
                <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
            </ul>
        </nav>
    </div>

    <div id="company-content" class="hidden w-full">
        <div class="overflow-x-auto bg-white rounded-xl">
            <table class="min-w-full divide-y divide-gray-200" id="companyTable">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(0, 'companyTable')">
                            No <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(1, 'companyTable')">
                            Company Name <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(2, 'companyTable')">
                            Email <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-left text-gray-700 uppercase cursor-pointer select-none"
                            onclick="sortTable(3, 'companyTable')">
                            Contact Person <span class="ml-1 text-xs">&#8597;</span>
                        </th>
                        <th class="px-6 py-3 text-xs font-bold text-center text-gray-700 uppercase">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <x-admin.company.item no="1" name="Acme Corp" email="contact@acme.com" contact="Jane Doe" />
                    <x-admin.company.item no="2" name="Beta Solutions" email="info@betasolutions.com" contact="John Smith" />
                </tbody>
            </table>
        </div>
        <nav class="flex justify-center mt-6">
            <ul class="flex space-x-2">
                <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Prev</span></li>
                <li><span class="px-3 py-1 bg-gray-900 rounded-full text-main5">1</span></li>
                <li><span class="px-3 py-1 text-gray-700 rounded-full cursor-pointer">2</span></li>
                <li><span class="px-3 py-1 text-gray-700 rounded-full cursor-pointer">3</span></li>
                <li><span class="px-3 py-1 text-gray-400 rounded-full cursor-not-allowed">Next</span></li>
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
