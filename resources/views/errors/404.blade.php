@extends('layout.site', ['title' => 'Сторінку не знайдено'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Сторінку не знайдено</li>

            </ol>
        </div>
    </nav>
    <h1>Помилка</h1>
    <div class="col-lg-12 p-null mt-4">
        <div class="alert-danger-style-2 bg-white px-3 py-4 fs-16px font-weight-600 font-montserrat mt-2">
            Сторінку не знайдено
        </div>

        <div class="row products-gutter-1px products-row">
        </div>
    </div>
@endsection
