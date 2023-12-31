@extends('layout.admin', ['title' => 'Усі категорії каталогу'])

@section('content')
    <h1>Усі категорії</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-4">
        Створити категорію
    </a>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Найменування</th>
            <th width="65%">Опис</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @include('admin.category.part.tree', ['level' => -1, 'parent' => 0])
    </table>
@endsection
