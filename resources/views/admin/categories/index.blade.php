@extends('admin.layout')

@section('content')
    <div class="page-box categories-page">

        <div class="page-header">

            <div class="page-title">
                <div class="page-title-icon">
                    <i class="bi bi-tags"></i>
                </div>

                <div>
                    <h2>الأقسام</h2>
                    <p>إدارة أقسام ومنتجات المتجر</p>
                </div>
            </div>


            <a href="{{ route('admin.categories.create') }}" class="add-btn">
                <i class="bi bi-plus-circle"></i>
                <span>إضافة قسم</span>
            </a>

        </div>


        <div class="categories-table-wrapper">

            <table class="categories-table">

                <thead>
                    <tr>
                        <th class="id-column">#</th>
                        <th>اسم القسم</th>
                        <th class="actions-column">الإجراءات</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse($categories as $category)
                        <tr>

                            <td class="category-id">
                                {{ $category->id }}
                            </td>

                            <td class="category-name">
                                {{ $category->name }}
                            </td>

                            <td>

                                <div class="category-actions">

                                    <!-- تعديل -->
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="action-btn edit-btn">

                                        <i class="bi bi-pencil"></i>
                                        <span>تعديل</span>

                                    </a>


                                    <!-- حذف -->
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="action-btn delete-btn" type="submit"
                                            onclick="return confirm('هل أنتِ متأكدة من حذف هذا القسم؟')">

                                            <i class="bi bi-trash"></i>
                                            <span>حذف</span>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="empty-categories">

                                <i class="bi bi-tags"></i>

                                <strong>لا توجد أقسام</strong>

                                <span>لم تتم إضافة أي أقسام إلى المتجر حتى الآن</span>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
