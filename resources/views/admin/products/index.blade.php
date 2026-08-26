@extends('admin.layout')

@section('content')
    <div class="page-box">


        <div class="page-header">
            <h2>
                <i class="bi bi-box"></i> Products
            </h2>

            <a href="{{ route('admin.products.create') }}" class="btn btn-save">
                <i class="bi bi-plus-lg"></i> Add Product
            </a>
        </div>


        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="220">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>

                        
                        <td>
                            @if ($product->photos->first())
                                <img src="{{ asset('storage/' . $product->photos->first()->image_pathe) }}"
                                     class="rounded"
                                     width="50">
                            @else
                                <img src="https://via.placeholder.com/50" class="rounded">
                            @endif
                        </td>

                        <td>{{ $product->name }}</td>


                        <td>
                            {{ $product->category->name ?? 'No Category' }}
                        </td>


                        <td>${{ $product->price }}</td>


                        <td>
                            @if ($product->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>


                        <td>
                            <div style="display:flex; gap:6px; align-items:center;">


                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="btn btn-sm"
                                   style="background-color:#7a3b69; color:white;">
                                    Edit
                                </a>


                                <form action="{{ route('admin.products.toggleStatus', $product->id) }}"
                                      method="POST">
                                    @csrf

                                    @if ($product->status == 1)
                                        <button type="submit" class="btn btn-sm btn-success">
                                            Active
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Inactive
                                        </button>
                                    @endif
                                </form>


                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')<button type="submit"
                                            class="btn btn-sm"
                                            style="background-color:#8e44ad; color:white;"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            No products found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
