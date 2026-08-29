@extends('layouts.app')

@section('content')
    <div class="auth-container">

        <div class="auth-card">

            {{-- مقدمة الصفحة --}}
            <div class="auth-header">

                <div class="auth-main-icon">
                    <i class="bi bi-person-circle"></i>
                </div>

                <span class="auth-label">
                    أهلاً بكِ من جديد
                </span>

                <h1 class="page-title">
                    تسجيل الدخول
                </h1>

                <p>
                    سجّلي دخولكِ للوصول إلى حسابكِ ومتابعة طلباتكِ بسهولة.
                </p>

            </div>


            {{-- رسائل الخطأ --}}

            @if (session('error'))
                <div class="auth-alert">
                    <i class="bi bi-exclamation-circle-fill"></i>

                    <span>
                        {{ session('error') }}
                    </span>
                </div>
            @endif


            @if ($errors->any())
                <div class="auth-alert">
                    <i class="bi bi-exclamation-circle-fill"></i>

                    <span>
                        {{ $errors->first() }}
                    </span>
                </div>
            @endif


            {{-- تسجيل الدخول --}}

            <form action="{{ url('/login') }}" method="POST">

                @csrf


                <div class="form-group">

                    <label for="email">
                        البريد الإلكتروني
                    </label>

                    <div class="auth-input">

                        <i class="bi bi-envelope-fill"></i>

                        <input type="email" id="email" name="email" placeholder="أدخلي بريدك الإلكتروني" required>

                    </div>

                </div>


                <div class="form-group">

                    <label for="password">
                        كلمة المرور
                    </label>

                    <div class="auth-input">

                        <i class="bi bi-lock-fill"></i>

                        <input type="password" id="password" name="password" placeholder="أدخلي كلمة المرور" required>

                    </div>

                </div>


                <button type="submit" class="btn auth-btn">

                    <span>
                        تسجيل الدخول
                    </span>

                    <i class="bi bi-arrow-left"></i>

                </button>


                <div class="auth-divider">
                    <span>أو</span>
                </div>


                <p class="auth-footer">

                    ليس لديكِ حساب؟

                    <a href="{{ url('/register') }}">
                        إنشاء حساب
                    </a>

                </p>

            </form>


        </div>

    </div>
@endsection
