@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark text-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-10 col-xl-6">
                    <h1 class="fw-bold mb-3">
                        {{ $title }}
                    </h1>
                    <form action="{{ route('post.all') . '/' . $id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete
                            Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-10 col-xl-6">
                    <div class="fs-5">
                        {{ $body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
