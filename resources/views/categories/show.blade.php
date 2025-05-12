@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-md-between align-items-center flex-column flex-md-row gap-3">
            <h1>{{ __('Category Edit') }}</h1>
            <a class="btn btn-primary" href="{{ route('categories.index') }}">
                {{ __('Back') }}
            </a>
        </div>

        <div class="mt-4">
            <table class="table table-striped">
                <tr>
                    <th>{{ __('ID') }}</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('Slug') }}</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tr>
                    <th>{{ __('Description') }}</th>
                    <td>{{ $category->description }}</td>
                </tr>
                <tr>
                    <th>{{ __('Created') }}</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th>{{ __('Updated') }}</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>

@endsection
