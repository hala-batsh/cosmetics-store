@extends('admin.layout')

@section('content')
    <div class="page-box">

        <div class="page-header">
            <h2>Edit Category</h2>
        </div>

        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="form-box">

            @csrf
            @method('PUT')


            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>


            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
            </div>

            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

        </form>

    </div>
@endsection
