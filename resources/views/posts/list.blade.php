@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark text-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-10 col-xl-6">
                    <h1 class="fw-bold mb-4">
                        Read Top Rated Blogs
                    </h1>
                    <a href="{{ route('post.create') }}" class="btn btn-primary btn-lg">Add New Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-dark text-light">
                                <span class="card-title h3">{{ $post->title }}</span>
                            </div>
                            <div class="card-body">
                                {{ Str::limit($post->body, 100, '...') }}
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('post.all') }}/{{ $post->id }}" class="btn btn-primary">View
                                    Details</a>
                                <a href="{{ route('post.all') }}/edit/{{ $post->id }}" class="btn btn-warning">Edit
                                    Post</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
