@extends('layouts.app')

@section('content')
    <div class="auth-container">

        <div class="auth-card">

            <h1 class="page-title">
                <i class="bi bi-person-plus-fill"></i> Register
            </h1>



            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/register" method="POST">

               
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>

                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>


                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>




                <div class="form-group">
                    <label for="mobile_phone">Mobile Phone</label>

                    <input type="text" id="mobile_phone" name="mobile_phone" placeholder="Enter your mobile phone"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>

                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>

                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm your password" required>
                </div>


                <button type="submit" class="btn auth-btn">
                    <i class="bi bi-person-check-fill"></i>
                    Register
                </button>


                <p class="auth-footer">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>

            </form>

        </div>

    </div>
@endsection
