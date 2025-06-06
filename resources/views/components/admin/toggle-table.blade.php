@props([
    'tab_1' => 'job',
    'tab_2' => 'activity',
 ])

<div id="{{ $tab_1 }}-{{ $tab_2 }}-toggle-container" class="flex relative items-center p-1 mb-6 bg-white rounded-full shadow-md w-fit">

    <div id="{{ $tab_1 }}-{{ $tab_2 }}-indicator" class="absolute top-1 bottom-1 bg-black rounded-full transition-all duration-300 ease-in-out"></div>

    <a href="" id="{{ $tab_1 }}-tab-link" data-tab="{{ $tab_1 }}" class="relative z-10 justify-center px-6 py-2 text-sm font-semibold rounded-full transition-colors duration-200 ease-in-out">
        {{ Str::ucfirst($tab_1) }}
    </a>
    <a href="" id="{{ $tab_2 }}-tab-link" data-tab="{{ $tab_2 }}" class="relative z-10 justify-center px-6 py-2 text-sm font-semibold rounded-full transition-colors duration-200 ease-in-out">
        {{ Str::ucfirst($tab_2) }}
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tab1Link = document.getElementById('{{ $tab_1 }}-tab-link');
        const tab2Link = document.getElementById('{{ $tab_2 }}-tab-link');
        const indicator = document.getElementById('{{ $tab_1 }}-{{ $tab_2 }}-indicator');
        const toggleContainer = document.getElementById('{{ $tab_1 }}-{{ $tab_2 }}-toggle-container');

        const tab1Content = document.getElementById('{{ $tab_1 }}-content');
        const tab2Content = document.getElementById('{{ $tab_2 }}-content');

        // Fungsi untuk memperbarui posisi dan lebar indikator serta menampilkan/menyembunyikan konten
        function updateIndicatorAndContent(activeLink) {
            if (!activeLink || !indicator || !toggleContainer || !tab1Content || !tab2Content) {
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
            tab1Link.classList.remove('text-yellowgoon', 'text-main', 'hover:text-neutral-900');
            tab2Link.classList.remove('text-yellowgoon', 'text-main', 'hover:text-neutral-900');

            if (activeLink === tab1Link) {
                tab1Link.classList.add('text-yellowgoon'); // Warna aktif
                tab2Link.classList.add('text-main', 'hover:text-neutral-900'); // Warna tidak aktif
                tab1Content.classList.remove('hidden');
                tab2Content.classList.add('hidden');
            } else {
                tab2Link.classList.add('text-yellowgoon'); // Warna aktif
                tab1Link.classList.add('text-main', 'hover:text-neutral-900'); // Warna tidak aktif
                tab2Content.classList.remove('hidden');
                tab1Content.classList.add('hidden');
            }
        }

        // Fungsi untuk menentukan tab aktif berdasarkan URL (query parameter)
        function getActiveTabFromUrl() {
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');
            if (tab === '{{ $tab_2 }}') {
                return tab2Link;
            }
            // Default ke tab pertama jika tidak ada parameter atau tidak dikenali
            return tab1Link;
        }

        // Event listener untuk tab pertama
        tab1Link.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah refresh halaman
            updateIndicatorAndContent(tab1Link);
            // Perbarui URL tanpa refresh halaman
            history.pushState({ tab: '{{ $tab_1 }}' });
        });

        // Event listener untuk tab kedua
        tab2Link.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah refresh halaman
            updateIndicatorAndContent(tab2Link);
            // Perbarui URL tanpa refresh halaman
            history.pushState({ tab: '{{ $tab_2 }}' });
        });

        // Panggil updateIndicatorAndContent saat DOMContentLoaded untuk posisi awal
        // Ini akan membaca dari URL atau default ke 'job'
        updateIndicatorAndContent(getActiveTabFromUrl());

        // Tambahkan event listener untuk resize window agar indikator menyesuaikan
        window.addEventListener('resize', function() {
            const currentActiveLink = tab1Link.classList.contains('text-yellowgoon') ? tab1Link : tab2Link;
            updateIndicatorAndContent(currentActiveLink);
        });

        // Tangani event popstate (saat user menggunakan tombol back/forward browser)
        window.addEventListener('popstate', function(event) {
            updateIndicatorAndContent(getActiveTabFromUrl());
        });
    });
</script>
