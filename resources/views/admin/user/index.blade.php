@extends('layout.admin', ['title' => 'Усі користувачі'])

@section('content')
    <h1 class="mb-4">Усі користувачі</h1>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th width="25%">Дата реєстрації</th>
            <th width="25%">Ім'я, прізвище</th>
            <th width="25%">Адреса пошти</th>
            <th width="20%">Кількість замовлень</th>
            <th><i class="fas fa-edit"></i></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $user->name }}</td>
                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                <td>{{ $user->orders->count() }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
@endsection

