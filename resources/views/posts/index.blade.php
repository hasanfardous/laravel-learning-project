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

                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('uploads/'. $post->image) }}" class="card-img-top" alt="{{ $post->title }}" />
                            <div class="card-body">
                                <a class="text-decoration-none" href="{{ route('posts.show', $post->id) }}">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                </a>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->description, 60, '...') }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                                @if(auth()->user()->id == $post->user_id)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                @endif
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
