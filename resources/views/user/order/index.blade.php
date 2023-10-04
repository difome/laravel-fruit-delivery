@extends('layout.site', ['title' => 'Ваші замовлення'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Ваші замовлення</li>

            </ol>
        </div>
    </nav>
    <h1>Ваші замовлення</h1>
    @if($orders->count())
        <table class="table table-bordered">
        <tr>
            <th width="2%">№</th>
            <th width="19%">Дата і час</th>
            <th width="12%">Статус</th>
            <th width="19%">Покупець</th>
            <th width="24%">Адреса пошти</th>
            <th width="22%">Номер телефону</th>
            <th width="2%"><i class="fas fa-eye"></i></th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $statuses[$order->status] }}</td>
                <td>{{ $order->name }}</td>
                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                <td>{{ $order->phone }}</td>
                <td>
                    <a href="{{ route('user.order.show', ['order' => $order->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </table>
        {{ $orders->links() }}
    @else
        <p>Замовлень поки що немає</p>
    @endif
@endsection
