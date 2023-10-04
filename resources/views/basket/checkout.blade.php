@extends('layout.site', ['title' => 'Оформити замовлення'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Оформити замовлення<</li>

            </ol>
        </div>
    </nav>
    <h1 class="mb-4">Оформити замовлення</h1>
    @guest
    <form method="post" action="{{ route('basket.saveorder') }}" id="checkout">
        @csrf
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Ім'я, Прізвище"
                   required maxlength="255" value="{{ old('name') }}">
        </div>
        <div class="form-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Адреса пошти"
                   required maxlength="255" value="{{ old('email') }}">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Номер телефону"
                   required maxlength="255" value="{{ old('phone') }}">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="address" placeholder="Адреса доставки"
                   required maxlength="255" value="{{ old('address')}}">
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control" name="comment" placeholder="Коментар"
                      maxlength="255" rows="2">{{ old('comment')}}</textarea>
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-success">Оформити</button>
        </div>
    </form>
    @endguest

    @auth

        <form method="post" action="{{ route('basket.saveorder') }}" id="checkout">
            @csrf
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Ім'я, Прізвище"
                       required maxlength="255" value="{{ old('name') ?? auth()->user()->name ?? '' }}">
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Адреса пошти"
                       required maxlength="255" value="{{ old('email') ?? auth()->user()->email ?? '' }}">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Номер телефону"
                       required maxlength="255" value="{{ old('phone') ?? auth()->user()->phone ?? '' }}">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="address" placeholder="Адреса доставки"
                       required maxlength="255" value="{{ old('address') ?? auth()->user()->address ?? '' }}">
            </div>
            <div class="form-group mb-3">
            <textarea class="form-control" name="comment" placeholder="Коментар"
                      maxlength="255" rows="2">{{ old('comment') }}</textarea>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-success">Оформити</button>
            </div>
        </form>
    @endauth
@endsection
