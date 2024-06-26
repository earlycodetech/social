@extends('layouts.app')
@section('content')
    <section>
        <div class="contaner">
            <div class="card mx-auto shadow" style="max-width: 800px;">
                <h5 class="text-center card-header">
                    All Feedbacks
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td> {{ $item->message }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($item->status === 'pending')
                                                    <form action="{{ route('feedback.update', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="btn btn-success">
                                                        <i class="fa-solid fa-check-double"></i>
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {!! $feedbacks->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </section>
@endsection
