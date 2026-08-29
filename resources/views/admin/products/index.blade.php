@extends('admin.layout')

@section('content')
    <div class="page-box products-page">

        <div class="page-header">

            <div class="page-title">

                <div class="page-title-icon products-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>
                    <h2>المنتجات</h2>
                    <p>إدارة منتجات المتجر ومتابعة حالتها</p>
                </div>

            </div>


            <a href="{{ route('admin.products.create') }}" class="add-btn">
                <i class="bi bi-plus-circle"></i>
                <span>إضافة منتج</span>
            </a>

        </div>


        <div class="products-table-wrapper">

            <table class="products-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th>القسم</th>
                        <th>السعر</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse($products as $product)
                        <tr>

                            <td class="product-id">
                                {{ $product->id }}
                            </td>


                            <td>

                                <div class="product-image">

                                    @if ($product->photos->first())
                                        <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                            alt="{{ $product->name }}">
                                    @else
                                        <div class="no-product-image">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif

                                </div>

                            </td>


                            <td class="product-name">
                                {{ $product->name }}
                            </td>


                            <td class="product-category">
                                {{ $product->category->name ?? 'بدون قسم' }}
                            </td>


                            <td class="product-price">
                                ${{ $product->price }}
                            </td>


                            <td>

                                @if ($product->status == 1)
                                    <span class="product-status status-active">
                                        <i class="bi bi-check-circle-fill"></i>
                                        متوفر
                                    </span>
                                @else
                                    <span class="product-status status-inactive">
                                        <i class="bi bi-x-circle-fill"></i>
                                        غير متوفر
                                    </span>
                                @endif

                            </td>


                            <td>

                                <div class="product-actions">

                                    <!-- تعديل -->
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="product-action edit-product">

                                        <i class="bi bi-pencil"></i>
                                        تعديل

                                    </a>


                                    <!-- تغيير الحالة -->
                                    <form action="{{ route('admin.products.toggleStatus', $product->id) }}" method="POST">

                                        @csrf

                                        @if ($product->status == 1)
                                            <button type="submit" class="product-action deactivate-product">

                                                <i class="bi bi-eye-slash"></i>
                                                إخفاء

                                            </button>
                                        @else
                                            <button type="submit" class="product-action activate-product">

                                                <i class="bi bi-eye"></i>
                                                تفعيل

                                            </button>
                                        @endif

                                    </form>


                                    <!-- حذف -->
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="product-action delete-product"
                                            onclick="return confirm('هل أنتِ متأكدة من حذف هذا المنتج؟')">

                                            <i class="bi bi-trash"></i>
                                            حذف

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="7" class="empty-products">

                                <i class="bi bi-box-seam"></i>

                                <strong>لا توجد منتجات</strong>

                                <span>لم تتم إضافة أي منتجات إلى المتجر حتى الآن</span>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
