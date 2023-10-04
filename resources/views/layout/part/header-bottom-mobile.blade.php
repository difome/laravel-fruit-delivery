<div class="header-bottom bg-white shadow-sm d-sm-block d-xl-none mb-3">
    <div class="">
        <div class="py-2 px-3 d-flex align-items-center h-100 justify-content-between">
            <div class="col-auto">
                <a class="text-dark font-weight-600" href="{{ route('index') }}">{{ config('app.name') }}</a>
            </div>
            <div class="col-auto mx-2">
                <a class="btn-warning catalog-btn py-2 px-2" href="{{ route('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="
    vertical-align: text-top;
">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                    </svg>
                    Каталог продуктів</a>


            </div>

            <div class="col-auto">
                <div class="">
                    <div class="d-flex">
                        <div class="text-center">
                            @auth
                                <a class="text-muted" href="{{ route('user.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </a>
                            @endauth

                            @guest
                                <a class="text-muted" href="{{ route('user.login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         fill="currentColor"
                                         class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </a>
                            @endguest

                        </div>

                        <div class="text-center mx-2">
                            <a class="text-muted" href="{{ route('basket.index') }}" id="top-basket">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                @if ($positions)
                                    <span class="header-basket__quan">{{ $positions }}</span>
                                @endif

                            </a>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
