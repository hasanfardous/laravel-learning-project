<h5>User List</h5>

@if(session('success'))
    <div style="background: green; color: #fff">{{ session('success') }}</div>
@endif

<h3>
    <a href="{{ route('user.create') }}"> {{ __('Add User') }}</a>
</h3>

<table style="width: 70%">
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
                <a href="{{ route('user.edit', $user->id) }}"
                    style="padding: 5px 15px; color: #fff; background: green; text-decoration: none;">{{ __('Edit') }}</a>
                <form action="{{ route('user.delete', $user->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" style="padding: 5px 15px; color: #fff; background: red; text-decoration: none;">{{ __('Delete') }}</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <th colspan="3"></th>
        </tr>
    @endforelse
</table>

<style>
    table tr td {
        padding-bottom: 10px;
    }
</style>
