@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="d-flex justify-content-md-between align-items-center flex-column flex-md-row gap-3">
            <h1>{{ __('My posts') }}</h1>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                {{ __('Create Post') }}
            </a>
        </div>

        <div class="my-posts mt-4">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-4">
                        <div class="post card">
                            <div class="card-body">
                                <img src="{{ asset('uploads/'. $post->image) }}" width="100%" height="300px; " />
                                <h3>{{ $post->title }}</h3>
                                <a class="btn btn-primary w-100" href="{{ route('posts.show', $post->id) }}">{{ __('View Post') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h3 class="text-center">{{ __('Not found ') }}</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
