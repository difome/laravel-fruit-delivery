@extends('layout.site', [
    'title' => 'ᐉ '. $category->name. ' капуста в Сумах з доставкою додому — Zelenyxaa',
    'description' => $category->name. ' – купити за вигідною ціною ⚡ Доставка по місту Суми ✔️ Інтернет-магазин продуктів Zelenyxaa ⭐'
])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item"><a
                        href="{{ route('catalog.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                </li>

            </ol>
        </div>
    </nav>
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->content }}</p>
    <div class="col-lg-12 products-block order-1 order-lg-2 ps-lg-0 mb-4">
{{--        @foreach ($category->children as $child)--}}
{{--            @include('catalog.part.category', ['category' => $child])--}}
{{--        @endforeach--}}


        <div class="products-block-container mt-4">
            <div class="col-lg-12 products-block order-1 order-lg-2 ps-lg-0">
                <div class="row products-gutter-1px products-row">
                    @foreach ($products as $product)
                        @include('catalog.part.product', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
        <div class="pagination-container mt-3 position-relative">
            {{ $products->links() }}
        </div>


    </div>
@endsection
