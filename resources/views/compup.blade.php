{{-- resources/views/compup.blade.php --}}
@extends('layout.app', [
    'userName' => 'Adevian Fairuz',
    'userProfileImage' => 'https://placehold.co/50x50'
])

@section('title')
    Companies
@endsection

@section('content')
<x-filter-bar>
    <x-filter-item :title='"Location"'/>
    <x-filter-item :title='"Company"'/>
</x-filter-bar>
<x-dashboard.layout gap="30px" :class='"pt-6"'>
    <div class="space-x-6 space-y-6">
        @for ($i = 0; $i < 5; $i++)
            <x-supervisor.company/>
        @endfor
    </div>
</x-dashboard.layout>

{{-- Include the modal component --}}
<x-supervisor.company-detail-modal />

<script>
function openCompanyModal(companyName, location, applied) {
    // Update modal content
    document.getElementById('modal-company-name').textContent = companyName;
    document.getElementById('modal-company-city').textContent = location;

    // Show the modal
    document.getElementById('company-detail-modal').classList.remove('hidden');
}

// Close modal when close button is clicked
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('close-company-modal').addEventListener('click', function() {
        document.getElementById('company-detail-modal').classList.add('hidden');
    });

    // Close modal when clicking outside
    document.getElementById('company-detail-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
});
</script>

@endsection
