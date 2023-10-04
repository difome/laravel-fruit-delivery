@extends('layout.site', ['title' => 'Ваш кошик'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Кошик</li>

            </ol>
        </div>
    </nav>
    <h1>Ваш кошик</h1>
    @if (count($products))
        <form action="{{ route('basket.clear') }}" method="post" class="text-right">
            @csrf
            <button type="submit" class="btn btn-outline-danger mb-4 mt-0">
                Очистити кошик
            </button>
        </form>
        <table class="table table-bordered table-wrap">
            <tr>
                <th>№</th>
                <th>Зображення</th>
                <th>Найменування</th>
                <th>Ціна</th>
                <th>К-сть</th>
                <th>Вартість</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', ['product' => $product->slug]) }}">
                            <img src="/storage/catalog/product/thumb/{{ $product->image }}" alt="{{ $product->name }}" width="50">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('catalog.product', ['product' => $product->slug]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>{{ number_format($product->price, 2, '.', '') }} грн</td>
                    <td>
                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-minus-square"></i>
                            </button>
                        </form>
                        <span class="mx-1">{{ $product->pivot->quantity }}</span>
                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}"
                              method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-plus-square"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        {{ number_format($product->price * $product->pivot->quantity, 2, '.', '') }} грн
                    </td>
                    <td>
                        <form action="{{ route('basket.remove', ['id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Разом</th>
                <th>{{ number_format($amount, 2, '.', '') }} грн</th>
                <th></th>
            </tr>
        </table>
        <a href="{{ route('basket.checkout') }}" class="btn btn-success float-right mt-3">
        Оформити замовлення
        </a>
    @else
        <p>Ваш кошик порожній</p>
    @endif
@endsection
