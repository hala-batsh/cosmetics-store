@extends('admin.layout')

@section('content')
    <div class="page-box">

        <h2 class="mb-4">
            <i class="bi bi-pencil-square"></i> Edit Product
        </h2>

        <form class="form-box" action="{{ route('admin.products.update', $product->id) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>


            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control" required>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>


            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>


            <div class="form-group">
                <label>Product Image</label>

                @if ($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" width="100">
                    </div>
                @endif

                <input type="file" name="image" class="form-control">
            </div>

           
            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    Update Product
                </button>

                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

        </form>

    </div>
@endsection
