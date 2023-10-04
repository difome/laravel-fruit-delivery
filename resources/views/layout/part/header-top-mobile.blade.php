<div class="header-top  p-1 shadow-sm d-lg-none d-block">
    <div class="">
        <div class="row h-100">
            <div class="col-2 col-lg-5 d-flex align-items-center d-xl-none" data-bs-toggle="offcanvas"
                 data-bs-target="#offcanvasNavbarLight">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="#fff"
                     class="open-side-menu cursor-pointer">
                    <path
                        d="M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z"></path>
                </svg>
            </div>

            <div class="d-lg-none d-block offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarLight"
                 aria-labelledby="offcanvasNavbarLightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">{{ config('app.name') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Закрити"></button>
                </div>

                <div class="offcanvas-body">
                    <div class="d-flex">
                        @guest
                            <a class="px-0" href="{{ route('user.login') }}">Вхід</a>
                            <span class="px-2">/</span>
                            <a class="" href="{{ route('user.register') }}">Реєстрація</a>
                        @endguest
                        @auth
                            <a class="d-flex align-items-center" href="{{ route('user.index') }}">
                                        <span class="icn text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                                </svg>
                                        </span>
                                <span class="text-dark fw-bold"> Особистий кабінет</span></a>

                        @endauth

                    </div>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" aria-current="page"
                               href="{{ route('index') }}">
                                    <span class="icn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="
    vertical-align: text-top;
">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                    </svg>
                                    </span>

                                <span class="fs-14px ">Каталог продукції</span></a>
                        </li>

                    </ul>

                    <div class="text-uppercase text-muted fs-13px px-0 pt-2 pb-1">Замовлення по телефону</div>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" aria-current="page" href="tel:00000">
                                    <span class="icn">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path
      d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
                                    </span>

                                <span class="fs-14px ">
        +38 (067) 000-00-10
    </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" aria-current="page" href="tel:00000">
                                    <span class="icn">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path
      d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
                                    </span>

                                <span class="fs-14px ">
        +38 (067) 000-00-15
    </span></a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-10 col-lg-7 col-xl-6 d-flex justify-content-end align-items-center">

                <div class="region-now me-3 me-md-5 fs-13px d-flex h-100 align-items-center text-white"
                     style="font-size: 13px">
                    Свіжі овочі та фрукти по м.Суми
                </div>

            </div>
        </div>
    </div>
</div>
