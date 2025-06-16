@extends('layout.app')

@section('title')
    Internship
@endsection


@section('content')
    <x-filter-bar>
        <x-filter-item title="Location" />
        <x-filter-item title="Work Type" />
        <x-filter-item title="Category" />
    </x-filter-bar>
    <x-dashboard.layout gap="30px" class="pt-6">
        <div class="grid grid-cols-2 gap-6">
            @foreach ($allInternships as $internship)
                <x-internship.card href="{{ route('detail.job', $internship->slug) }}" :company="$internship->company->name" :due="$internship->remaining_time"
                    :location="$internship->location" :title="$internship->title" :type="$internship->type" :internship_id="$internship->id"
                    :applied="count($internship->applications)" />
            @endforeach
        </div>
    </x-dashboard.layout>
@endsection
