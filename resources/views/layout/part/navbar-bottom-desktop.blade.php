<nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 d-none d-lg-block">
    <div class="container-app-nav ">
        <a class="navbar-brand " href="{{ route('index') }}">{{ config('app.name') }}</a>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbar-example">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link btn-warning catalog-btn mx-5" href="{{ route('index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="
    vertical-align: text-top;
">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                        </svg>
                        Каталог продуктів</a>
                </li>

            </ul>



            <div class="d-flex align-items-center w-50">
                <form action="{{ route('catalog.search') }}" class="form-inline my-2 my-lg-0 flex-grow-1">
                    <div class="input-group">
                        <input class="form-control" type="search" name="query" placeholder="Пошук" aria-label="Search" @if(request()->has('query')) value="{{ request('query') }}" @endif>

                        <div class="input-group-append">
                            <button class="btn btn-success search-btn" type="submit">Знайти</button>
                        </div>
                    </div>
                </form>
            </div>


            <ul class="navbar-nav ml-auto">

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Вхід</a>
                    </li>
                    @if (Route::has('user.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Реєстрація</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                 class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                            </svg>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" id="top-basket2"
                       href="{{ route('basket.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                             class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>
                        @if ($positions)
                            <span class="header-basket__quan">{{ $positions }}</span>
                        @endif
                    </a>

                </li>
            </ul>
        </div>
    </div>
</nav>
