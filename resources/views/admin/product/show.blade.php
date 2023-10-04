@extends('layout.admin', ['title' => 'Перегляд товару'])

@section('content')
    <h1>Перегляд товару</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Назва:</strong> {{ $product->name }}</p>
            <p><strong>ЧПУ (англ):</strong> {{ $product->slug }}</p>
            <p><strong>Категорія:</strong> {{ $product->category->name }}</p>
            <p><strong>Новинка:</strong> @if($product->new) так @else ні @endif</p>
            <p><strong>Лідер продажів:</strong> @if($product->hit) так @else ні @endif</p>
            <p><strong>Розпродаж:</strong> @if($product->sale) так @else ні @endif</p>
            <p><strong>Наявність:</strong> @if($product->in_stock) так @else ні @endif</p>
        </div>
        <div class="col-md-6">
            @php
                if ($product->image) {
                    $url = url('storage/catalog/product/image/' . $product->image);
                } else {
                    $url = url('storage/catalog/product/image/default.jpg');
                }
            @endphp
            <img src="{{ $url }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><strong>Опис</strong></p>
            @isset($product->content)
                <p>{{ $product->content }}</p>
            @else
                <p>Опис відсутній</p>
            @endisset
            <a href="{{ route('admin.product.edit', ['product' => $product->id]) }}"
               class="btn btn-success">
               Редагувати товар
            </a>
            <form method="post" class="d-inline" onsubmit="return confirm('Видалити цей товар?')"
                  action="{{ route('admin.product.destroy', ['product' => $product->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Видалити товар
                </button>
            </form>
        </div>
    </div>
@endsection
