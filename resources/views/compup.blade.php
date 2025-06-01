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

@endsection
