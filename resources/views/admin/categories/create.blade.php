@extends('admin.layout')

@section('content')
    <div class="page-box category-form-page">

        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon">
                    <i class="bi bi-plus-circle"></i>
                </div>

                <div>
                    <h2>إضافة قسم جديد</h2>
                    <p>أضيفي قسماً جديداً إلى متجر التجميل</p>
                </div>

            </div>

        </div>


        <form class="form-box" method="POST" action="{{ route('admin.categories.store') }}">

            @csrf


            <div class="form-group">

                <label for="name">
                    اسم القسم
                </label>

                <input type="text" id="name" name="name" class="form-input" placeholder="أدخلي اسم القسم">

            </div>


            <div class="form-group">

                <label for="description">
                    وصف القسم
                </label>

                <textarea id="description" name="description" class="form-input form-textarea" rows="5"
                    placeholder="أدخلي وصف القسم"></textarea>

            </div>


            <div class="form-actions">

                <button type="submit" class="save-btn">
                    <i class="bi bi-check-circle"></i>
                    حفظ القسم
                </button>


                <a href="{{ route('admin.categories.index') }}" class="back-btn">
                    <i class="bi bi-arrow-right"></i>
                    العودة إلى الأقسام
                </a>

            </div>

        </form>

    </div>
@endsection
