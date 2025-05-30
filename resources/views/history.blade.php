@extends('layout.app', [
    'userName' => 'Baihaqi',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    History
@endsection

@section('content')
<div class="bg-[#faf8f6] rounded-2xl p-8 mt-8">
    <h2 class="text-2xl font-bold mb-8">History</h2>
    <div class="flex justify-end mb-4">
        <input type="text" class="search-bar rounded-full border border-gray-200 px-4 py-2 w-56 focus:outline-none focus:ring-2 focus:ring-primary-200" placeholder="Search">
    </div>
    <div class="overflow-x-auto rounded-xl bg-white">
        <table class="min-w-full divide-y divide-gray-200" id="historyTable">
            <thead class="bg-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(0)">
                        No <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(1)">
                        Company Name <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(2)">
                        Role <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(3)">
                        Location <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(4)">
                        Work Type <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(5)">
                        Date <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase cursor-pointer select-none" onclick="sortTable(6)">
                        Status <span class="ml-1 text-xs">&#8597;</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32" class="w-8 h-8 rounded-full object-cover" alt="Jasa Ayah Corp.">
                        Jasa Ayah Corp.
                    </td>
                    <td class="px-6 py-4">UI &amp; UX</td>
                    <td class="px-6 py-4">Malang</td>
                    <td class="px-6 py-4">Hybrid</td>
                    <td class="px-6 py-4">27 May 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-xs">Pending</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">2</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/4caf50/fff?text=G" class="w-8 h-8 rounded-full object-cover" alt="GRADIN Digital A...">
                        GRADIN Digital A...
                    </td>
                    <td class="px-6 py-4">Frontend</td>
                    <td class="px-6 py-4">Surabaya</td>
                    <td class="px-6 py-4">Remote</td>
                    <td class="px-6 py-4">28 May 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-xs">Pending</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">3</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/222/fff?text=S" class="w-8 h-8 rounded-full object-cover" alt="GRADIN Digital A...">
                        GRADIN Digital A...
                    </td>
                    <td class="px-6 py-4">Backend</td>
                    <td class="px-6 py-4">Sumatera</td>
                    <td class="px-6 py-4">Remote</td>
                    <td class="px-6 py-4">29 May 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-xs">Pending</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">4</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/3cbf5a/fff?text=SP" class="w-8 h-8 rounded-full object-cover" alt="Spilla Jewelry">
                        Spilla Jewelry
                    </td>
                    <td class="px-6 py-4">Data Analyst</td>
                    <td class="px-6 py-4">Kalimantan</td>
                    <td class="px-6 py-4">Hybrid</td>
                    <td class="px-6 py-4">30 May 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-green-100 text-green-700 font-semibold text-xs">Accepted</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">5</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/00bcd4/fff?text=E" class="w-8 h-8 rounded-full object-cover" alt="PT. Elga Tama">
                        PT. Elga Tama
                    </td>
                    <td class="px-6 py-4">Cyber Security</td>
                    <td class="px-6 py-4">Papua</td>
                    <td class="px-6 py-4">Hybrid</td>
                    <td class="px-6 py-4">01 June 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-xs">Pending</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">6</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/e53935/fff?text=W" class="w-8 h-8 rounded-full object-cover" alt="PT. Wook Global A...">
                        PT. Wook Global A...
                    </td>
                    <td class="px-6 py-4">App Developer</td>
                    <td class="px-6 py-4">Bali</td>
                    <td class="px-6 py-4">Hybrid</td>
                    <td class="px-6 py-4">02 June 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-red-100 text-red-700 font-semibold text-xs">Rejected</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">7</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/ff5722/fff?text=V" class="w-8 h-8 rounded-full object-cover" alt="PT. Karya Mas Mak...">
                        PT. Karya Mas Mak...
                    </td>
                    <td class="px-6 py-4">System Analyst</td>
                    <td class="px-6 py-4">Lombok</td>
                    <td class="px-6 py-4">Remote</td>
                    <td class="px-6 py-4">03 June 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-red-100 text-red-700 font-semibold text-xs">Rejected</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">8</td>
                    <td class="px-6 py-4 flex items-center gap-2">
                        <img src="https://placehold.co/32x32/f44336/fff?text=Y" class="w-8 h-8 rounded-full object-cover" alt="Yudikasi Teknologi I...">
                        Yudikasi Teknologi I...
                    </td>
                    <td class="px-6 py-4">Network Admin</td>
                    <td class="px-6 py-4">Malaysia</td>
                    <td class="px-6 py-4">Hybrid</td>
                    <td class="px-6 py-4">04 June 2025</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-4 py-1 rounded-full bg-red-100 text-red-700 font-semibold text-xs">Rejected</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav class="mt-6 flex justify-center">
        <ul class="flex space-x-2">
            <li><span class="px-3 py-1 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">Prev</span></li>
            <li><span class="px-3 py-1 rounded-full bg-gray-900 text-white">1</span></li>
            <li><span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 cursor-pointer">2</span></li>
            <li><span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 cursor-pointer">3</span></li>
            <li><span class="px-3 py-1 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">Next</span></li>
        </ul>
    </nav>
</div>

<script>
document.querySelector('.search-bar').addEventListener('input', function() {
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