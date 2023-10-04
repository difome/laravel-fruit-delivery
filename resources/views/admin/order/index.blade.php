@extends('layout.admin', ['title' => 'Усі замовлення'])

@section('content')
    <h1>Усі замовленны</h1>

    <table class="table table-bordered table-wrap">
        <tr>
            <th>№</th>
            <th width="18%">Дата і час</th>
            <th width="5%">Статус</th>
            <th width="18%">Покупець</th>
            <th width="18%">Адреса пошти</th>
            <th width="18%">Номер телефону</th>
            <th width="18%">Користувач</th>
            <th><i class="fas fa-eye"></i></th>
            <th><i class="fas fa-edit"></i></th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    @if ($order->status == 0)
                        <span class="text-danger">{{ $statuses[$order->status] }}</span>
                    @elseif (in_array($order->status, [1,2,3]))
                        <span class="text-success">{{ $statuses[$order->status] }}</span>
                    @else
                        {{ $statuses[$order->status] }}
                    @endif
                </td>
                <td>{{ $order->name }}</td>
                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                <td>{{ $order->phone }}</td>
                <td>
                    @isset($order->user)
                        {{ $order->user->name }}
                    @endisset
                </td>
                <td>
                    <a href="{{ route('admin.order.show', ['order' => $order->id]) }}">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.order.edit', ['order' => $order->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $orders->links() }}
@endsection
