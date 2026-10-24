@extends('layouts.app')
@section('title', 'Login')
@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    @error('email')<p class="error">{{ $message }}</p>@enderror
    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>
    <p><label><input type="checkbox" name="remember" value="1" style="width:auto"> Remember me</label></p>
    <button type="submit">Log in</button>
</form>
<p class="muted">Local test account: maroj@example.com / Password123!</p>
@endsection
