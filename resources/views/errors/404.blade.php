{{-- @extends(!auth()->check() ? 'layouts.users' : 'layouts.app') --}}
@extends('layouts.app')
@section('content')
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card mx-auto py-5 px-2" style="max-width: 900px;">
            <img src="{{ asset('404.gif') }}" class="w-100 object-fit-contain" alt="" >
            <h1 class="text-center">404 -  Not Found</h1>

            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Go back
                </a>
            </div>
        </div>
    </div>
@endsection