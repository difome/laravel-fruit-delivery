<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '🚚 Доставка фруктів, овочів та горіхів у Сумах - Zelenyxaa 🛒' }}</title>
    <meta name="description" content="{{ $description ?? '🍏🥦🌰 Доставка фруктів, овочів та горіхів в місті Суми. Замовлення свіжих та смачних продуктів в інтернет-магазині Zelenyxaa' }}"></meta>
    <meta property="og:title" content="{{ $title ?? '🚚 Доставка фруктів, овочів та горіхів у Сумах - Zelenyxaa 🛒' }}" />
    <meta property="og:description" content="{{ $description ?? '🍏🥦🌰 Доставка фруктів, овочів та горіхів в місті Суми. Замовлення свіжих та смачних продуктів в інтернет-магазині Zelenyxaa' }}" />
    <meta property="og:locale" content="uk_UA" />
    <meta property="og:site_name" content="🚚 Доставка фруктів, овочів та горіхів у Сумах - Zelenyxaa 🛒" />
    <meta property="og:type" content="website" />
    @if(request()->path() != '/')
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    <meta name="twitter:title" content="{{ $title ?? '🚚 Доставка фруктів, овочів та горіхів у Сумах - Zelenyxaa 🛒' }}" />
    <meta name="twitter:description" content="{{ $description ?? '🍏🥦🌰 Доставка фруктів, овочів та горіхів в місті Суми. Замовлення свіжих та смачних продуктів в інтернет-магазині Zelenyxaa' }}" />
    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"{{ $title ?? '🚚 Доставка фруктів, овочів та горіхів у Сумах - Zelenyxaa 🛒' }}","description":"{{ $description ?? '🍏🥦🌰 Доставка фруктів, овочів та горіхів в місті Суми. Замовлення свіжих та смачних продуктів в інтернет-магазині Zelenyxaa' }}"}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/site.css') }}?r=<?= random_int(222, 333)?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>

</head>
<body class="{{ request()->routeIs('index') ? 'index-body-class' : 'default-body-class' }}">


<div class="app">
    @include('layout.part.header-top-mobile')

    @include('layout.part.navbar-desktop')

    @include('layout.part.header-bottom-mobile')

    @include('layout.part.navbar-bottom-desktop')


    <div class="container-app mb-4">
        <div class="row">

            <div class="col-sm-12 mx-auto">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-0" role="alert">
                        <span class="close" data-dismiss="alert" aria-label="Закрити">
                            <span aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </span>
                        {{ $message }}
                    </div>
                @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible mt-0" role="alert">
                        <span class="close" data-dismiss="alert" aria-label="Закрити">
                            <span aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </span>
                            {{ $message }}
                        </div>
                    @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                        <span class="close" data-dismiss="alert" aria-label="Закрити">
                            <span aria-hidden="true">&times;</span>
                        </span>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</div>


<footer class="footer layout-footer">
    <div class="container-app-footer">
        <div class="d-lg-flex align-items-center">
            <!-- Блок для моб -->
            <div class="col-lg-12 col-12 d-block d-lg-none p-3">
                <div class="text-uppercase text-muted fs-13px px-0 pb-1">{{ config('app.name') }} {{ date('Y') }}</div>
            </div>

            <!-- Блок для ПК -->
            <div class="col-lg-10 col-12 d-block d-lg-block d-none">
                <div class="text-uppercase text-muted fs-13px px-0 pb-1">{{ config('app.name') }} {{ date('Y') }}</div>
            </div>

            <!-- Блок для ПК  -->
            <div class="col-lg-3 col-3 py-4 d-lg-block d-none">
                <div class="text-uppercase text-muted fs-13px px-0 pb-1">Замовлення по телефону</div>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" aria-current="page" href="#">
        <span class="icn">


                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
          <path
              d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
        </svg>
                                            </span>
                            <span class="fs-14px">+38 (067) 000-00-10</span>
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Блок для моб -->
            <div class="col-lg-4 col-7 d-block d-lg-none p-3">
                <div class="text-uppercase text-muted fs-13px px-0 pb-1">Замовлення по телефону</div>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" aria-current="page" href="#">
                            <span class="icn">
<span class="icn">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path
      d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
</svg>
                                    </span>
                            </span>
                            <span class="fs-14px">+38 (067) 000-00-10</span>
                        </a>
                    </li>

                </ul>
            </div>

        </div>

    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/bks.js') }}"></script>
</body>
</html>
