@extends('layout.site', ['title' => 'Вхід в особистий кабінет'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Вхід</li>

            </ol>
        </div>
    </nav>

    <div class="col-lg-3 product full-product  mx-auto">
        <div class=" h-100 position-relative  p-3 mb-1 product__info pb-5">
            <h1>Вхід</h1>

            <form method="POST" action="{{ route('user.login') }}">
                @csrf

                <div class="col-md-12 form-group mb-3 w-100">
                    <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                    <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
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

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn btn-success">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('user.password.request'))
                            <a class="btn btn-link fs-14px" href="{{ route('user.password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif


                    </div>
                </div>

                <div class="form-group row mt-1">
                    <div class="text-center mt-3">
                        <a href="{{ route('user.register') }}" class="fs-14px cursor-pointer text-success border-bottom-dashed-success font-montserrat fw-bold change-form" data-change-form-to="register-form">Зареєструватися</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
