@extends('layouts.app')
@section('content')
    <section>
        <div class="contaner">
            <div class="card mx-auto shadow" style="max-width: 500px;">
                <h5 class="text-center card-header">
                    Send Us a Message
                </h5>
           
                <div class="card-body">
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf
                        {{-- Cross Site Resource Forgery --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="" />
                            <label for="name">Name</label>

                            @error('name')
                                <p class="small fw-bold text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="" />
                            <label for="email">Email</label>
                            @error('email')
                                <p class="small fw-bold text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="message" id="msg" class="form-control" style="height: 200px;" rows="10"></textarea>
                            <label for="msg">Message</label>
                            @error('message')
                                <p class="small fw-bold text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="text-center mb-3">
                            <button class="btn btn-light">
                                Send Message
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
