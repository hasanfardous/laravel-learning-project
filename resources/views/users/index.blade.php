@extends('layouts.app')
@section('content')

    <div class="container">
        <h5>User List</h5>

        @if(session('success'))
            <div style="background: green; color: #fff">{{ session('success') }}</div>
        @endif

        <h3>
            <a class="btn btn-primary mb-2" href="{{ route('user.create') }}"> {{ __('Add User') }}</a>
        </h3>

        <table class="table table-striped">
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>

            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <a href="{{ route('user.edit', $user->id) }}"
                               class="btn btn-success">{{ __('Edit') }}</a>
                            <form action="{{ route('user.delete', $user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" style="padding: 5px 15px; color: #fff; background: red; text-decoration: none;">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="3"></th>
                </tr>
            @endforelse
        </table>

    </div>

@endsection
