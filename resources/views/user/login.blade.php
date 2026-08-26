@extends('layouts.app')

@section('content')
    <div class="auth-container">

        <div class="auth-card">

            <h1 class="page-title"><i class="bi bi-person-circle"></i> Login</h1>



            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif


            <form action="{{ url('/login') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn auth-btn">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>

                <p class="auth-footer">
                    Don't have an account?
                    <a href="{{ url('/register') }}">Register</a>
                </p>

            </form>

        </div>

    </div>
@endsection
