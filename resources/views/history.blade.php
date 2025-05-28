@extends('layout.app', [
    'userName' => 'Baihaqi',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    History
@endsection

@section('content')
<style>
     .history-table-container h2 {
        font-size: 2rem; /* Change this value as needed */
        font-weight: bold;
        margin-bottom: 24px;
    }    document.querySelector('.search-bar').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const table = document.getElementById('historyTable');
        const trs = table.querySelectorAll('tbody tr');
        trs.forEach(tr => {
            const rowText = tr.textContent.toLowerCase();
            tr.style.display = rowText.includes(filter) ? '' : 'none';
        });
    });
    .history-table-container {
        background: #faf8f6;
        border-radius: 20px;
        padding: 32px 24px;
        margin-top: 32px;
    }
    .history-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #ececec;
    }
    .history-table th, .history-table td {
        vertical-align: middle;
        padding: 12px 16px;
        white-space: nowrap;
        border-bottom: 1px solid #ececec;
    }
    .history-table th {
        font-weight: bold;
        border-bottom: 2px solid #ececec;
        cursor: pointer;
        user-select: none;
    }
    .sort-arrow {
        font-size: 0.8em;
        margin-left: 4px;
    }
    .company-logo {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 8px;
    }
    .badge-status {
        padding: 6px 18px;
        border-radius: 16px;
        font-weight: 500;
        font-size: 0.95em;
        display: inline-block;
    }
    .badge-pending {
        background: #f9f7e7;
        color: #bfae3c;
        border: 1px solid #f3eebd;
    }
    .badge-accepted {
        background: #e6f7e7;
        color: #3cbf5a;
        border: 1px solid #bdf3c9;
    }
    .badge-denied {
        background: #fbeaea;
        color: #bf3c3c;
        border: 1px solid #f3bdbd;
    }
    .search-bar {
        border-radius: 20px;
        border: 1px solid #eee;
        padding: 8px 16px;
        width: 220px;
        outline: none;
        margin-bottom: 18px;
        float: right;
    }
    .pagination {
        margin-top: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
        padding-left: 0;
    }
    .pagination .page-item {
        margin: 0 2px;
    }
    .pagination .page-link {
        border-radius: 50%;
        color: #222;
        border: none;
        background: none;
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
    }
    .pagination .active .page-link {
        background: #222;
        color: #fff;
    }
    .pagination .disabled .page-link {
        color: #bbb;
        pointer-events: none;
    }
    .history-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #ececec;
        background: #fff; 
        overflow: hidden;
        border-radius: 16px;
    }
</style>

<div class="history-table-container">
    <h2 class="mb-10">History</h2>
    <input type="text" class="search-bar" placeholder="Search">
    <table class="table history-table" id="historyTable">
        <thead>
            <tr>
                <th onclick="sortTable(0)">No <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(1)">Company Name <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(2)">Role <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(3)">Location <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(4)">Work Type <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(5)">Date <span class="sort-arrow">&#8597;</span></th>
                <th onclick="sortTable(6)">Status <span class="sort-arrow">&#8597;</span></th>
            </tr>
        </thead>
        <tbody>
            {{-- Example static data --}}
            <tr>
                <td>1</td>
                <td>
                    <img src="https://placehold.co/32x32" class="company-logo" alt="Jasa Ayah Corp.">
                    Jasa Ayah Corp.
                </td>
                <td>UI &amp; UX</td>
                <td>Malang</td>
                <td>Hybrid</td>
                <td>27 May 2025</td>
                <td><span class="badge-status badge-pending"><i class="bi bi-clock"></i> Pending</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td>
                    <img src="https://placehold.co/32x32/4caf50/fff?text=G" class="company-logo" alt="GRADIN Digital A...">
                    GRADIN Digital A...
                </td>
                <td>Frontend</td>
                <td>Surabaya</td>
                <td>Remote</td>
                <td>28 May 2025</td>
                <td><span class="badge-status badge-pending">Pending</span></td>
            </tr>
            <tr>
                <td>3</td>
                <td>
                    <img src="https://placehold.co/32x32/222/fff?text=S" class="company-logo" alt="GRADIN Digital A...">
                    GRADIN Digital A...
                </td>
                <td>Backend</td>
                <td>Sumatera</td>
                <td>Remote</td>
                <td>29 May 2025</td>
                <td><span class="badge-status badge-pending">Pending</span></td>
            </tr>
            <tr>
                <td>4</td>
                <td>
                    <img src="https://placehold.co/32x32/3cbf5a/fff?text=SP" class="company-logo" alt="Spilla Jewelry">
                    Spilla Jewelry
                </td>
                <td>Data Analyst</td>
                <td>Kalimantan</td>
                <td>Hybrid</td>
                <td>30 May 2025</td>
                <td><span class="badge-status badge-accepted">Accepted</span></td>
            </tr>
            <tr>
                <td>5</td>
                <td>
                    <img src="https://placehold.co/32x32/00bcd4/fff?text=E" class="company-logo" alt="PT. Elga Tama">
                    PT. Elga Tama
                </td>
                <td>Cyber Security</td>
                <td>Papua</td>
                <td>Hybrid</td>
                <td>01 June 2025</td>
                <td><span class="badge-status badge-pending">Pending</span></td>
            </tr>
            <tr>
                <td>6</td>
                <td>
                    <img src="https://placehold.co/32x32/e53935/fff?text=W" class="company-logo" alt="PT. Wook Global A...">
                    PT. Wook Global A...
                </td>
                <td>App Developer</td>
                <td>Bali</td>
                <td>Hybrid</td>
                <td>02 June 2025</td>
                <td><span class="badge-status badge-denied">Rejected</span></td>
            </tr>
            <tr>
                <td>7</td>
                <td>
                    <img src="https://placehold.co/32x32/ff5722/fff?text=V" class="company-logo" alt="PT. Karya Mas Mak...">
                    PT. Karya Mas Mak...
                </td>
                <td>System Analyst</td>
                <td>Lombok</td>
                <td>Remote</td>
                <td>03 June 2025</td>
                <td><span class="badge-status badge-denied">Rejected</span></td>
            </tr>
            <tr>
                <td>8</td>
                <td>
                    <img src="https://placehold.co/32x32/f44336/fff?text=Y" class="company-logo" alt="Yudikasi Teknologi I...">
                    Yudikasi Teknologi I...
                </td>
                <td>Network Admin</td>
                <td>Malaysia</td>
                <td>Hybrid</td>
                <td>04 June 2025</td>
                <td><span class="badge-status badge-denied">Rejected</span></td>
            </tr>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item disabled"><span class="page-link">Prev</span></li>
            <li class="page-item active"><span class="page-link">1</span></li>
            <li class="page-item"><span class="page-link">2</span></li>
            <li class="page-item"><span class="page-link">3</span></li>
            <li class="page-item"><span class="page-link">Next</span></li>
        </ul>
    </nav>
</div>

<script>
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