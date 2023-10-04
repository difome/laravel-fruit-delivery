@extends('layout.admin', ['title' => 'Редагування товару'])

@section('content')
    <h1>Редагування товару</h1>
    <form method="post" enctype="multipart/form-data"
          action="{{ route('admin.product.update', ['product' => $product->id]) }}">
        @method('PUT')
        @include('admin.product.part.form')
    </form>
@endsection
