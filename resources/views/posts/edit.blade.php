@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-md-between align-items-center flex-column flex-md-row gap-3">
            <h1>{{ __('Post Edit') }}</h1>
            <a class="btn btn-primary" href="{{ route('posts.index') }}">
                {{ __('Back') }}
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mt-4">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-2">
                    <label class="form-label">{{ __('Title') }}</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" />
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">{{ __('Category') }}</label>
                    <select class="form-select"  name="category_id" id="category" >
                        <option value="">{{ __('Select Category') }}</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $id }}" @if((old('category_id') ?? $post->category_id) == $id) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-2 row">
                    <div class="col-md-6">
                        <label class="form-label">{{ __('Image') }}</label>
                        <input class="form-control" type="file" name="image" id="image" value="{{ old('image') }}" />
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @if($post->image)
                            <img src="{{ asset('uploads/'. $post->image) }}" alt="{{ $post->title }}" width="300" />
                        @endif
                    </div>

                </div>

                <div class="mb-2">
                    <label class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" name="description" id="description" >{{ old('description') ?? $post->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary w-25">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
