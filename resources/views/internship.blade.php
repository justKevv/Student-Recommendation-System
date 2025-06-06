@extends('layout.app')

@section('title')
    Internship
@endsection

@section('content')
    <x-filter-bar>
        <x-filter-item :title='"Location"'/>
        <x-filter-item :title='"Work Type"'/>
        <x-filter-item :title='"Category"'/>
    </x-filter-bar>
    <x-dashboard.layout gap="30px" :class='"pt-6"' >
        <div class="grid grid-cols-2 gap-6">
            @for ($i = 0; $i < 10; $i++)
                <x-internship.card href="{{ route('detail.job') }}" />
            @endfor
        </div>
    </x-dashboard.layout>

@endsection
