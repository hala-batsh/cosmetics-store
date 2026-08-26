@extends('layouts.app')

@section('content')
    <section class="page-hero">

        <div class="page-hero-content">


            <h1>
                اكتشفي
                <span>عالم الجمال</span>
            </h1>

            <p class="page-description">
                اختيارات راقية صُممت لتمنحك كل ما تحتاجينه لإطلالة متكاملة
            </p>

        </div>

    </section>

    <section class="categories-page">

        <div class="categories-grid">

            @foreach ($categories->where('status', 1)->take(6) as $category)
                @php
                    $images = [
                        'face.jpg',
                        'eyes.jpg',
                        'lips.jpg',
                        'nails.jpg',
                        'hair.jpg',
                        'body.jpg',
                        'fragrance.jpg',
                        'tools.jpg',
                    ];

                    $image = $images[$loop->index];
                @endphp

                <div class="category-card">

                    {{-- الصورة فقط --}}

                    <div class="category-image">
                        <img src="{{ asset('images/categories/' . $image) }}" alt="{{ $category->name }}">
                    </div>


                    {{-- المحتوى تحت الصورة --}}

                    <div class="category-info">


                        <h2>
                            {{ $category->name }}
                        </h2>

                        <p>
                            {{ $category->description ?? 'اختيارات مختارة بعناية لتكمّل جمالك وتمنحك إطلالة أكثر أناقة.' }}
                        </p>

                        <a href="{{ route('category.products', $category->id) }}">

                            اكتشفي المجموعة

                            <i class="bi bi-arrow-left"></i>

                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    </section>
@endsection
