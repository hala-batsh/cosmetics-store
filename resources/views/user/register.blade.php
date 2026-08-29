@extends('layouts.app')

@section('content')
    <div class="auth-container">

        <div class="auth-card">

            {{-- مقدمة الصفحة --}}
            <div class="auth-header">

                <div class="auth-main-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </div>

                <span class="auth-label">
                    أهلاً بكِ معنا
                </span>

                <h1 class="page-title">
                    إنشاء حساب جديد
                </h1>

                <p>
                    أنشئي حسابكِ الآن واستمتعي بتجربة تسوق أجمل وأسهل.
                </p>

            </div>


            {{-- رسائل الخطأ --}}

            @if ($errors->any())
                <div class="auth-alert">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <span>
                        {{ $errors->first() }}
                    </span>

                </div>
            @endif


            {{-- نموذج التسجيل --}}

            <form action="/register" method="POST">

                @csrf


                <div class="form-group">

                    <label for="name">
                        الاسم الكامل
                    </label>

                    <div class="auth-input">

                        <i class="bi bi-person-fill"></i>

                        <input type="text" id="name" name="name" placeholder="أدخلي اسمك الكامل" required>

                    </div>

                </div>


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

                    <label for="mobile_phone">
                        رقم الهاتف
                    </label>

                    <div class="auth-input">

                        <i class="bi bi-phone-fill"></i>

                        <input type="text" id="mobile_phone" name="mobile_phone" placeholder="أدخلي رقم هاتفك" required>

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


                <div class="form-group">

                    <label for="password_confirmation">
                        تأكيد كلمة المرور
                    </label>

                    <div class="auth-input">

                        <i class="bi bi-shield-lock-fill"></i>

                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="أعيدي إدخال كلمة المرور" required>

                    </div>

                </div>


                <button type="submit" class="btn auth-btn">

                    <span>
                        إنشاء الحساب
                    </span>

                    <i class="bi bi-arrow-left"></i>

                </button>


                <div class="auth-divider">
                    <span>أو</span>
                </div>


                <p class="auth-footer">

                    لديكِ حساب بالفعل؟

                    <a href="{{ route('login') }}">
                        تسجيل الدخول
                    </a>

                </p>

            </form>

        </div>

    </div>
@endsection
