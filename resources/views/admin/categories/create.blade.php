@extends('admin.layout')

@section('content')
    <div class="page-box">


        <div class="page-header">
            <h2>
                <i class="bi bi-plus-circle"></i>
                Add New Category
            </h2>
        </div>


        <form class="form-box" method="POST" action="{{ route('admin.categories.store') }}">

            @csrf


            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter category name">
            </div>


            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Enter description"></textarea>
            </div>

        
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Save
                </button>

                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

        </form>

    </div>
@endsection
