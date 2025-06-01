@extends('layout.app')

@section('title')
    Job Activity
@endsection

@section('content')
    <x-interadm.job-activity/>
    
    <x-filter-bar>
        <x-filter-item :title='"Location"'/>
        <x-filter-item :title='"Work Type"'/>
        <x-filter-item :title='"Category"'/>
        <div class="justify-end">
            <x-interadm.add-internship/>
        </div>
    </x-filter-bar>

    {{-- <x-dashboard.layout gap="30px" :class='"pt-6"' >
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @for ($i = 0; $i < 6; $i++)
                <x-interadm.card-activity />
            @endfor
        </div>
    </x-dashboard.layout> --}}

    <div id="job-content" class="w-full">
        <x-dashboard.layout gap="30px" :class='"pt-6"' >
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @for ($i = 0; $i < 6; $i++)
                    <x-interadm.card-job />
                @endfor
            </div>
        </x-dashboard.layout>
    </div>

    <div id="activity-content" class="w-full hidden">
        <x-dashboard.layout gap="30px" :class='"pt-6"' >
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @for ($i = 0; $i < 6; $i++)
                    <x-interadm.card-activity />
                @endfor
            </div>
        </x-dashboard.layout>
    </div>

@endsection

