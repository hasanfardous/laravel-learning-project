@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-md-between align-items-center flex-column flex-md-row gap-3">
            <h1>{{ __('Category list') }}</h1>
            <a class="btn btn-primary" href="{{ route('categories.create') }}">
                {{ __('Create') }}
            </a>
        </div>

        <div class="mt-4">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name}}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success">View</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="4">{{ __('Not found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
