@extends('layouts.users')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center gap-4">
            <img src="{{ asset('avatars/user.png') }}" id="avatar" alt="">
            <div>
                <p class="fs-5 fw-bold mb-1"> {{ fake()->name }} </p>
                <p class="mb-1 small">
                    {{ '@'.fake()->username }}
                </p>
            </div>
        </div>

        <p>
            {{ fake()->realText(100) }}
        </p>
    </div>

    <div class="card-body">
        <img src="{{ asset('image-3.jpg') }}" class="img-fluid w-100 post-image"  alt="">
    </div>
  </div>
</div>
@endsection
