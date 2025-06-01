{{-- resources/views/components/interadm/job-activity.blade.php --}}

{{-- Container untuk tab toggle --}}
<div id="job-activity-toggle-container" class="relative flex items-center bg-white rounded-full shadow-xl p-1 mb-6 w-fit">
    {{-- Indikator Geser (Latar Belakang Hitam) --}}
    <div id="job-activity-indicator" class="absolute top-1 bottom-1 bg-black rounded-full transition-all duration-300 ease-in-out"></div>

    {{-- Tombol/Link Job --}}
    <a href="?tab=job" id="job-tab-link" data-tab="job" class="relative z-10 px-6 py-2 rounded-full font-semibold text-sm transition-colors duration-200 ease-in-out">
        Job
    </a>

    {{-- Tombol/Link Activity --}}
    <a href="?tab=activity" id="activity-tab-link" data-tab="activity" class="relative z-10 px-6 py-2 rounded-full font-semibold text-sm transition-colors duration-200 ease-in-out">
        Activity
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jobTabLink = document.getElementById('job-tab-link');
        const activityTabLink = document.getElementById('activity-tab-link');
        const indicator = document.getElementById('job-activity-indicator');
        const toggleContainer = document.getElementById('job-activity-toggle-container');

        const jobContent = document.getElementById('job-content');
        const activityContent = document.getElementById('activity-content');

        // Fungsi untuk memperbarui posisi dan lebar indikator serta menampilkan/menyembunyikan konten
        function updateIndicatorAndContent(activeLink) {
            if (!activeLink || !indicator || !toggleContainer || !jobContent || !activityContent) {
                console.error("Missing elements for toggle functionality.");
                return;
            }

            const activeRect = activeLink.getBoundingClientRect();
            const containerRect = toggleContainer.getBoundingClientRect();

            // Hitung lebar dan posisi relatif dari container toggle
            const newWidth = activeRect.width;
            const newTransformX = activeRect.left - containerRect.left;

            // Terapkan gaya ke indikator
            indicator.style.width = `${newWidth}px`;
            indicator.style.transform = `translateX(${newTransformX}px)`;

            // Atur warna teks untuk link aktif dan tidak aktif
            jobTabLink.classList.remove('text-yellow-400', 'text-gray-600', 'hover:text-gray-900');
            activityTabLink.classList.remove('text-yellow-400', 'text-gray-600', 'hover:text-gray-900');

            if (activeLink === jobTabLink) {
                jobTabLink.classList.add('text-yellow-400'); // Warna aktif
                activityTabLink.classList.add('text-gray-600', 'hover:text-gray-900'); // Warna tidak aktif
                jobContent.classList.remove('hidden');
                activityContent.classList.add('hidden');
            } else {
                activityTabLink.classList.add('text-yellow-400'); // Warna aktif
                jobTabLink.classList.add('text-gray-600', 'hover:text-gray-900'); // Warna tidak aktif
                activityContent.classList.remove('hidden');
                jobContent.classList.add('hidden');
            }
        }

        // Fungsi untuk menentukan tab aktif berdasarkan URL (query parameter)
        function getActiveTabFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');
            if (tab === 'activity') {
                return activityTabLink;
            }
            // Default ke 'job' jika tidak ada parameter atau tidak dikenali
            return jobTabLink;
        }

        // Event listener untuk link Job
        jobTabLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah refresh halaman
            updateIndicatorAndContent(jobTabLink);
            // Perbarui URL tanpa refresh halaman
            history.pushState({ tab: 'job' }, '', '?tab=job');
        });

        // Event listener untuk link Activity
        activityTabLink.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah refresh halaman
            updateIndicatorAndContent(activityTabLink);
            // Perbarui URL tanpa refresh halaman
            history.pushState({ tab: 'activity' }, '', '?tab=activity');
        });

        // Panggil updateIndicatorAndContent saat DOMContentLoaded untuk posisi awal
        // Ini akan membaca dari URL atau default ke 'job'
        updateIndicatorAndContent(getActiveTabFromUrl());

        // Tambahkan event listener untuk resize window agar indikator menyesuaikan
        window.addEventListener('resize', function() {
            const currentActiveLink = jobTabLink.classList.contains('text-yellow-400') ? jobTabLink : activityTabLink;
            updateIndicatorAndContent(currentActiveLink);
        });

        // Tangani event popstate (saat user menggunakan tombol back/forward browser)
        window.addEventListener('popstate', function(event) {
            updateIndicatorAndContent(getActiveTabFromUrl());
        });
    });
</script>
