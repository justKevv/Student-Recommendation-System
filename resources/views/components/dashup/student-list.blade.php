@props([
    'students', // Array of student objects (e.g., from DB or dummy data)
    'currentPage',
    'totalPages',
    'selectedEntriesPerPage',
    'entriesPerPageOptions' => [10, 20, 50], // Default options
])

<div class="mt-6"> {{-- Margin-top untuk memisahkan dari search bar/judul --}}
    {{-- Table Headers (menggunakan grid agar sesuai dengan baris) --}}
    {{-- <div class="grid grid-cols-12 items-center py-2 px-4 text-xs font-semibold text-gray-500 uppercase border-b border-gray-200 mb-3">
        <div class="col-span-6">Student Info</div>
        <div class="col-span-4 text-right">Progress</div>
        <div class="col-span-2 text-right">Actions</div>
    </div> --}}

    {{-- Student Rows --}}
    <div class="space-y-3">
        @forelse ($students as $student)
            {{-- Mengakses properti menggunakan sintaks objek ($student->property) --}}
            {{-- Ini penting agar siap saat data dari database (Eloquent Model) --}}
            <x-dashup.student-table-row
                :name="$student->name"
                :role="$student->role"
                :completed="$student->completed_tasks" {{-- Asumsi nama kolom DB adalah completed_tasks --}}
                :total="$student->total_tasks"       {{-- Asumsi nama kolom DB adalah total_tasks --}}
                :profileImage="$student->profile_image ?? 'https://placehold.co/50x50'"
            />
        @empty
            <p class="text-center text-gray-500 py-8">No student data available.</p>
        @endforelse
    </div>

    <div class="mt-8 flex items-center justify-between text-gray-600 text-sm">
        {{-- Left Section: Dropdown Entries per page --}}
        <div class="flex items-center space-x-2">
            <select class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
                @foreach ($entriesPerPageOptions as $option)
                    <option value="{{ $option }}" {{ $selectedEntriesPerPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                @endforeach
            </select>
            <span>Entries per page</span>
        </div>

        {{-- Center Section: Tombol Prev/Next dan nomor halaman saat ini --}}
        <div class="flex items-center space-x-4">
            {{-- Previous Page Button --}}
            {{-- Link akan disiapkan untuk menerima URL pagination dari Laravel --}}
            <a href="#" {{-- Placeholder for Laravel pagination URL --}}
               class="p-2 rounded-full border border-gray-300 hover:bg-gray-100 {{ $currentPage <= 1 ? 'opacity-50 pointer-events-none' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            
            {{-- Current Page Number --}}
            <span class="font-semibold">{{ $currentPage }}</span>
            
            {{-- Next Page Button --}}
            {{-- Link akan disiapkan untuk menerima URL pagination dari Laravel --}}
            <a href="#" {{-- Placeholder for Laravel pagination URL --}}
               class="p-2 rounded-full border border-gray-300 hover:bg-gray-100 {{ $currentPage >= $totalPages ? 'opacity-50 pointer-events-none' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        
        {{-- Right Section: Dropdown pemilih halaman --}}
        <div class="flex items-center space-x-2">
            <span>Page</span>
            <select class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-200">
                @for ($i = 1; $i <= $totalPages; $i++)
                    <option value="#" {{-- Placeholder for Laravel pagination URL --}} {{ $i == $currentPage ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
</div>