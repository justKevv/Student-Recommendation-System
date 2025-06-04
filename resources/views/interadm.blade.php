@extends('layout.app')

@section('title')
    Job Activity
@endsection

@section('content')
    <x-admin.toggle-table/>

    <x-filter-bar>
        <x-filter-item :title='"Location"'/>
        <x-filter-item :title='"Work Type"'/>
        <x-filter-item :title='"Category"'/>
        <div class="pl-150">
            <x-admin.add-data/>
        </div>
    </x-filter-bar>

    <div id="job-content" class="w-full">
        <x-dashboard.layout gap="30px" :class='"pt-6"' >
            <div class="space-x-6 space-y-6">
                @for ($i = 0; $i < 10; $i++)
                    <x-internship.card :is_admin='true' href="{{ route('detail.job') }}" />
                @endfor
            </div>
        </x-dashboard.layout>
    </div>

    <div id="activity-content" class="hidden w-full">
        <x-dashboard.layout gap="30px" :class='"pt-6"' >
            <div class="space-x-6 space-y-6">
                @for ($i = 0; $i < 5; $i++)
                    <x-internship.card :is_admin='true' href="{{ route('detail.job') }}" />
                @endfor
            </div>
        </x-dashboard.layout>
    </div>

@endsection
