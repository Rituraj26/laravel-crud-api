@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-10 col-xl-6">
                    @include('posts.form')
                </div>
            </div>
        </div>
    </div>
@endsection
