@extends('layouts.users')

@section('content')
    <div class="container">
        @forelse ($posts as $post)
            <div class="card mb-5 mx-auto" style="max-width: 600px;">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('avatars/' . $post->user->avatar) }}" id="avatar" alt="">
                        <div>
                            <p class="fs-5 fw-bold mb-1"> {{ $post->user->name }} </p>
                            <p class="mb-1 small">
                                {{ '@' . $post->user->username }}
                            </p>
                        </div>
                    </div>

                    @if ($post->caption)
                            <p class="pt-3">
                                {{ $post->caption }}
                            </p>
                    @endif
                </div>

                @if ($post->image)
                    <div class="card-body">
                        <a href="{{ asset('uploads/posts/' . $post->image) }}" data-fslightbox>

                            <img src="{{ asset('uploads/posts/' . $post->image) }}" class="img-fluid w-100 post-image"
                                alt="{{ $post->caption }}">
                        </a>
                    </div>
                @endif
            </div>
        @empty
            <p class="p-5 h1 fw-bold">
                No Post Added Yet
            </p>
        @endforelse
    </div>
@endsection
