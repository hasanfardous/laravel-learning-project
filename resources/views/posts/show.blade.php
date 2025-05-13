@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-md-between align-items-center flex-column flex-md-row gap-3">
            <h1>{{ __('Show Post') }}</h1>
            <a class="btn btn-primary" href="{{ route('posts.index') }}">
                {{ __('Back') }}
            </a>
        </div>

        <div class="mt-4 d-flex flex-column gap-4">
            <div>
                <h1>{{ $post->title }}</h1>
                <small>Author: {{ $post->user->name }}</small> <small>Created: {{ $post->created_at }}</small>
                <p><span class="fw-bold">Category: </span> {{ $post->category->name }}</p>
            </div>
            <img src="{{ asset('uploads/'. $post->image) }}" width="500" alt="{{ $post->title }}"/>
            <p>{{ $post->description }}</p>

            @if(auth()->user()->id == $post->user_id)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif

        </div>
    </div>

@endsection
