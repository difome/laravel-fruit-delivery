@extends('layout.site', ['title' => 'Регистрация на сайте'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Реєстрація</li>

            </ol>
        </div>
    </nav>

    <div class="col-lg-3 product full-product  mx-auto">
        <div class=" h-100 position-relative  p-3 mb-1 product__info pb-5">
            <h1>Реєстрація</h1>

            <form method="POST" action="{{ route('user.register') }}">
                @csrf

                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                </div>
                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Email') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                </div>
                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="email" class="col-md-12 col-form-label text-md-right">Номер телефону</label>

                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>


                </div>
                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <div class="col-md-12 offset-md-12">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-0" style="
    margin: auto;
    text-align: center;
">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success text-center">
                            Заруєструватися
                        </button>




                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="text-center mt-2 fs-14px">
                        <a href="{{ route('user.login') }}" class="cursor-pointer text-decoration- text-success border-bottom-dashed-success font-montserrat fw-bold change-form" data-change-form-to="register-form">Я вже зареєструваний </a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
