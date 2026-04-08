@extends('layouts.auth')

@section('title', 'Login — EnrollPortal')

@section('content')
<div class="card">
    <div class="card-title">Sign in to your account</div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn">Log In</button>
    </form>
</div>

<div class="auth-footer">
    Don't have an account? <a href="{{ route('register') }}">Register here</a>
</div>
@endsection
