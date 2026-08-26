@extends('admin.layout')

@section('content')
    <div class="page-box">

        <div class="page-header">
            <h2>
                <i class="bi bi-tags"></i> Categories
            </h2>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-success btn-lg ">
                <i class="bi bi-plus-circle"></i> Add Category
            </a>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th width="60">#</th>
                    <th>Name</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>

                        <td>

                            <div style="display:flex; gap:6px; align-items:center;">

                                <!-- Edit -->
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm"
                                    style="background-color:#7a3b69; color:white;">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm" type="submit" style="background-color:#8e44ad; color:white;"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>

                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No categories found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>
@endsection
