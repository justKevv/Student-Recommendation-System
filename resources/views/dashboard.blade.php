@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('layout.dashboard.' . $user->role)
@endsection
