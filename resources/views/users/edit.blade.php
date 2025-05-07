<h1>{{ __('User Edit #:id', ['id' => $user->id]) }}</h1>
<form action="{{ route('user.update', $user->id) }}" method="post">
    @method('PATCH')
    @csrf

    <div>
        <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') ?? $user->name }}">
        @error('name')
        <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div style="margin-top: 20px;">
        <input type="text" name="email" placeholder="Email address" value="{{ old('email') ?? $user->email }}">
        @error('email')
        <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" style="margin-top: 20px;"> {{ __('Update') }}</button>
</form>
