@extends('layout.site', ['title' => 'Результати пошуку '.$search])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Пошук</li>

            </ol>
        </div>
    </nav>
    <h1>Результати пошуку «{{ $search }}»</h1>

    @if (count($products))


    <div class="col-lg-12 products-block order-1 order-lg-2 ps-lg-0 mb-4">
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

    @else
            <div class="col-lg-12 p-null mt-4">
                <div class="alert-danger-style-2 bg-white px-3 py-4 fs-16px font-weight-600 font-montserrat mt-2">
                    Пошук не дав результатів
                </div>

                <div class="row products-gutter-1px products-row">
                </div>
            </div>
    @endif
@endsection
