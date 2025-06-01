@extends('auth.layout.app')
@section('title')
    @yield('title')
@endsection
@section('content')
    <div class="w-[973px] h-[713px] relative">
        <img class="size-80 left-[46px] top-[240px] absolute" src="https://ik.imagekit.io/1qy6epne0l/next-step/assets/asset_image_327815367.png?updatedAt=1747983843980" />
        @yield('content')
    </div>
@endsection
