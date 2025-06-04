@extends('layout.app')

@section('title')
    Profile
@endsection

@section('content')
    @if (auth()->user()->role == 'student')
        @include('layout.profile.student')
    @elseif (auth()->user()->role =='supervisor')
        @include('layout.profile.supervisor')
    @endif
@endsection
