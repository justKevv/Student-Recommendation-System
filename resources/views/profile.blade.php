@extends('layout.app')

@section('title')
    Profile
@endsection

@section('content')
    @include('layout.profile.' . $user->role)
@endsection
