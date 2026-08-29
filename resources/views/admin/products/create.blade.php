@extends('admin.layout')

@section('content')
    <div class="page-box product-form-page">


        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon products-icon">
                    <i class="bi bi-plus-circle"></i>
                </div>

                <div>
                    <h2>إضافة منتج جديد</h2>
                    <p>أضيفي منتجاً جديداً إلى متجر التجميل</p>
                </div>

            </div>

        </div>


        <form class="form-box product-form-box" action="{{ route('admin.products.store') }}" method="POST"
            enctype="multipart/form-data">

            @csrf


            <!-- اسم المنتج -->
            <div class="form-group">

                <label for="name">
                    اسم المنتج
                </label>

                <input type="text" id="name" name="name" class="form-input" placeholder="أدخلي اسم المنتج"
                    required>

            </div>


            <!-- القسم -->
            <div class="form-group">

                <label for="category_id">
                    القسم
                </label>

                <select name="category_id" id="category_id" class="form-input" required>

                    <option value="">
                        اختاري القسم
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
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

                    <input type="number" id="price" name="price" class="form-input" placeholder="أدخلي سعر المنتج"
                        required>

                    <span>$</span>

                </div>

            </div>


            <!-- الوصف -->
            <div class="form-group">

                <label for="description">
                    وصف المنتج
                </label>

                <textarea name="description" id="description" class="form-input form-textarea product-description" rows="6"
                    placeholder="أدخلي وصف المنتج"></textarea>

            </div>


            <!-- العلامة التجارية -->
            <div class="form-group">

                <label for="brand_id">
                    العلامة التجارية
                </label>

                <select name="brand_id" id="brand_id" class="form-input">

                    <option value="">
                        اختاري العلامة التجارية
                    </option>

                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">
                            {{ $brand->name }}
                        </option>
                    @endforeach

                </select>

            </div>


            <!-- المخزون -->
            <div class="form-group">

                <label for="stock">
                    الكمية في المخزون
                </label>

                <input type="number" id="stock" name="stock" class="form-input" placeholder="أدخلي كمية المخزون"
                    required>

            </div>


            <!-- SKU -->
            <div class="form-group">

                <label for="sku">
                    رمز المنتج (SKU)
                </label>

                <input type="text" id="sku" name="sku" class="form-input" placeholder="أدخلي رمز المنتج SKU"
                    required>

            </div>


            <!-- صورة المنتج -->
            <div class="form-group">

                <label>
                    صورة المنتج
                </label>

                <div class="file-upload">

                    <i class="bi bi-cloud-arrow-up"></i>

                    <div>
                        <strong>اختاري صورة المنتج</strong>
                        <span>اضغطي هنا لاختيار صورة من جهازك</span>
                    </div>

                    <input type="file" name="image" class="file-input">

                </div>

            </div>


            <!-- الأزرار -->
            <div class="form-actions">

                <button type="submit" class="save-btn">

                    <i class="bi bi-check-circle"></i>

                    حفظ المنتج

                </button>


                <a href="{{ route('admin.products.index') }}" class="back-btn">

                    <i class="bi bi-x-circle"></i>

                    إلغاء

                </a>

            </div>

        </form>
        

    </div>
@endsection
