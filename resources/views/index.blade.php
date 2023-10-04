@extends('layout.site')

@section('content')
{{--    @if($new->count())--}}
{{--        <h2>Новинки</h2>--}}
{{--        <div class="row products-gutter-1px products-row">--}}
{{--        @foreach($new as $item)--}}
{{--            @include('catalog.part.product', ['product' => $item])--}}
{{--        @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if($hit->count())--}}
{{--        <h2>Лідери продажів</h2>--}}
{{--        <div class="row products-gutter-1px products-row">--}}
{{--            @foreach($hit as $item)--}}
{{--                @include('catalog.part.product', ['product' => $item])--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if($sale->count())--}}
{{--        <h2>Розпродаж</h2>--}}
{{--        <div class="row products-gutter-1px products-row">--}}
{{--            @foreach($sale as $item)--}}
{{--                @include('catalog.part.product', ['product' => $item])--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}
<div class="row">
    @foreach ($roots as $root)
        @include('catalog.part.category_home', ['category' => $root])
    @endforeach
</div>
@endsection
