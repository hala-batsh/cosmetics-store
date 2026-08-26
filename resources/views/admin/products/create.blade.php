@extends('admin.layout')

@section('content')
    <div class="page-box">

        <h2 class="mb-4">
            <i class="bi bi-plus-circle"></i> Add Product
        </h2>

        <form class="form-box" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

            @csrf


            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product name" required>
            </div>


            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    <option value=""> Select Category </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" placeholder="Price" required>
            </div>


            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Product description"></textarea>
            </div>

            <label>Brand</label>
            <select name="brand_id" class="form-control mb-3">
                <option value="">Select Brand </option>

                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>

            <label>Stock</label>
            <input type="number" name="stock" class="form-control mb-3" placeholder="Stock" required>

            <label>SKU</label>
            <input type="text" name="sku" class="form-control mb-3" placeholder="Stock Keeping Unit (SKU)" required>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </form>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    Save Product
                </button>

                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
@endsection
