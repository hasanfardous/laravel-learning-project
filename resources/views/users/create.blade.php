<h1>{{ __('Create User') }}</h1>
<form action="{{ route('user.store') }}" method="post">
    @method('POST')
    @csrf

    <div>
        <input type="text" name="name" placeholder="Enter your full name" value="{{ old('name') ?? "" }}">
        @error('name')
        <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="text" name="email" placeholder="Email address" value="{{ old('email') ?? "" }}">
        @error('email')
        <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="text" name="phone" placeholder="Enter Your phone" value="{{ old('phone') ?? "" }}">
        @error('phone')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <input type="password" name="password" placeholder="Enter password" value="{{ old('password') ?? "" }}">
        @error('password')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>


    <button type="submit"> {{ __('Create') }}</button>
</form>
