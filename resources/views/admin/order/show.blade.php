@extends('layout.admin', ['title' => 'Перегляд замовлення'])

@section('content')
    <h1>Дані на замовлення № {{ $order->id }}</h1>
    <a href="{{ route('admin.order.edit', ['order' => $order->id]) }}">
        <i class="far fa-edit"></i> Редагувати
    </a>
    <p>
        Статус замовлення:
        @if ($order->status == 0)
            <span class="text-danger">{{ $statuses[$order->status] }}</span>
        @elseif (in_array($order->status, [1,2,3]))
            <span class="text-success">{{ $statuses[$order->status] }}</span>
        @else
            {{ $statuses[$order->status] }}
        @endif
    </p>

    <h3 class="mb-3">Склад замовлення</h3>
    <table class="table table-bordered table-wrap">
        <tr>
            <th>№</th>
            <th>Найменування</th>
            <th>Ціна</th>
            <th>Кіл-сть</th>
            <th>Стоимость</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price, 2, '.', '') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->cost, 2, '.', '') }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Итого</th>
            <th>{{ number_format($order->amount, 2, '.', '') }}</th>
        </tr>
    </table>

    <h3 class="mb-3">Дані покупця</h3>
    <p>Ім'я, прізвище: {{ $order->name }}</p>
    <p>Адреса пошти: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Номер телефону: {{ $order->phone }}</p>
    <p>Адреса доставки: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Комментарий: {{ $order->comment }}</p>
    @endisset


@endsection

