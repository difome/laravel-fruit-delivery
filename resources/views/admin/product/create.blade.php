@extends('layout.admin', ['title' => 'Створення товару'])

@section('content')
    <h1>Створення нового товару</h1>
    <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
        @include('admin.product.part.form')
    </form>
@endsection
