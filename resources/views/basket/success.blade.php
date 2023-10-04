@extends('layout.site', ['title' => 'Замовлення зроблено'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Ваш кошик</li>

            </ol>
        </div>
    </nav>
    <h1>Замовлення зроблено</h1>

    <p>Ваше замовлення успішно зроблено. Наш менеджер скоро зв'яжеться з Вами для уточнення деталей.</p>

    <h2>Ваше замовлення</h2>
    <table class="table table-bordered table-wrap">
        <tr>
            <th>№</th>
            <th>Найменування</th>
            <th>Ціна</th>
            <th>К-сть</th>
            <th>Вартість</th>
        </tr>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ number_format($item->price, 2, '.', '') }} грн</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->cost, 2, '.', '') }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Разом</th>
            <th>{{ number_format($order->amount, 2, '.', '') }} грн</th>
        </tr>
    </table>

    <h2>Ваші дані</h2>
    <p>Ім'я, прізвище: {{ $order->name }}</p>
    <p>Адреса пошти: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Номер телефону: {{ $order->phone }}</p>
    <p>Адреса доставки: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Коментар: {{ $order->comment }}</p>
    @endisset
@endsection
