@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (auth()->user()->role == 'student')
        @include('layout.dashboard.student')
    @elseif (auth()->user()->role =='supervisor')
        @include('layout.dashboard.supervisor')
    @endif
@endsection
