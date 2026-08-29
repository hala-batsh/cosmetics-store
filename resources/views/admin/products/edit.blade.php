@extends('admin.layout')

@section('content')
    <div class="page-box product-form-page">

        ```
        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon products-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>

                <div>
                    <h2>تعديل المنتج</h2>
                    <p>تعديل معلومات المنتج وتحديث بياناته</p>
                </div>

            </div>

        </div>


        <form class="form-box product-form-box" action="{{ route('admin.products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <!-- اسم المنتج -->
            <div class="form-group">

                <label for="name">
                    اسم المنتج
                </label>

                <input type="text" id="name" name="name" class="form-input" value="{{ $product->name }}"
                    placeholder="أدخلي اسم المنتج" required>

            </div>


            <!-- القسم -->
            <div class="form-group">

                <label for="category_id">
                    القسم
                </label>

                <select name="category_id" id="category_id" class="form-input" required>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>
                    @endforeach

                </select>

            </div>


            <!-- السعر -->
            <div class="form-group">

                <label for="price">
                    السعر
                </label>

                <div class="price-input">
                    <input type="number" id="price" name="price" class="form-input" value="{{ $product->price }}"
                        placeholder="أدخلي سعر المنتج" required>

                    <span>$</span>
                </div>

            </div>


            <!-- الوصف -->
            <div class="form-group">

                <label for="description">
                    وصف المنتج
                </label>

                <textarea name="description" id="description" class="form-input form-textarea product-description" rows="6"
                    placeholder="أدخلي وصف المنتج">{{ $product->description }}</textarea>

            </div>


            <!-- صورة المنتج -->
            <div class="form-group">

                <label>
                    صورة المنتج
                </label>


                @if ($product->image)
                    <div class="current-product-image">

                        <span>الصورة الحالية</span>

                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">

                    </div>
                @endif


                <div class="file-upload">

                    <i class="bi bi-cloud-arrow-up"></i>

                    <div>
                        <strong>اختاري صورة جديدة</strong>
                        <span>يمكنكِ ترك الحقل فارغاً للاحتفاظ بالصورة الحالية</span>
                    </div>

                    <input type="file" name="image" class="file-input">

                </div>

            </div>


            <!-- الأزرار -->
            <div class="form-actions">

                <button type="submit" class="save-btn">
                    <i class="bi bi-check-circle"></i>
                    حفظ تعديلات المنتج
                </button>


                <a href="{{ route('admin.products.index') }}" class="back-btn">

                    <i class="bi bi-arrow-right"></i>
                    العودة إلى المنتجات

                </a>

            </div>

        </form>
        ```

    </div>
@endsection
