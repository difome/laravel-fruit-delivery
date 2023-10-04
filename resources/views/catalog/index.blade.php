@extends('layout.site', ['title' => 'Каталог товаров'])

@section('content')
    <h1 class="page-main-header">Каталог продуктів харчування</h1>


    <!-- <h2 class="mb-4">Розділи каталогу</h2> -->
    <div class="row">
        @foreach ($roots as $root)
            @include('catalog.part.category', ['category' => $root])
        @endforeach
    </div>

{{--    <h2 class="mb-4">Популярні товари</h2>--}}
{{--    <div class="row">--}}
{{--        @foreach ($brands as $brand)--}}
{{--            @include('catalog.part.brand', ['brand' => $brand])--}}
{{--        @endforeach--}}
{{--    </div>--}}
@endsection


