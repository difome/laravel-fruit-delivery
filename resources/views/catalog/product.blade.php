@extends('layout.site', [
    'title' => 'Купити ' . $product->name . ' по кращій ціні в ⭐ Zelenyxaa ⭐ Доставка по місту Суми',
    'description' => 'Купити ' . $product->name . ' по кращій ціні в ⭐ Zelenyxaa ⭐ Доставка по місту Суми'])


@section('content')

    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>
                @if ($product->category->parentCategory)
                    <li class="breadcrumb-item">
                        <a href="{{ route('catalog.category', ['category' => $product->category->parentCategory->slug]) }}">{{ $product->category->parentCategory->name }}</a>
                    </li>
                @endif
                <li class="breadcrumb-item">
                    <a href="{{ route('catalog.category', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                </li>

                <span class="breadcrumb-item">{{ $product->name }}</span>


            </ol>
        </div>
    </nav>

    <section class="product full-product mt-3" data-product-id="{{ $product->id }}" data-cart-product-id="">
        <div class="row">
            <div class="col-lg-5">
                <div class=" h-100 position-relative  p-3 mb-1 product__info pb-5" style="text-align: center;">
                    @if ($product->image)
                        @php($url = url('storage/catalog/product/image/' . $product->image))
                        <img src="{{ $url }}" alt="" class="img-fluid">
                    @else
                        <img src="https://via.placeholder.com/600x300" alt="" class="img-fluid">
                    @endif

                </div>
            </div>
            <div class="col-lg-7 ps-lg-0">
                <div class=" p-3 mb-1">
                    <h1 class="mt-0 mb-2 font-weight-600">{{ $product->name }}</h1>
                    <div class="d-flex align-items-center">
                        <div class="text-gray">Код товару:</div>
                        <div class="px-2 font-weight-600 ms-1"
                             style="background: #f2f2f2;border-radius: .25rem;">{{ $product->id }}</div>
                    </div>


                </div>

                @if($product->in_stock)
                    <div class="p-3 mb-1">
                        <span class="px-2 py-1 d-inline-flex rounded text-success fill-success font-weight-600 fs-14px"
                              style="background: #f2f2f2;">
                            <svg width="18" height="18" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                 clip-rule="evenodd" class="me-1" style="fill: #00a919!important;">
                                <path d="M21 6.285l-11.16 12.733-6.84-6.018 1.319-1.49 5.341 4.686 9.865-11.196 1.475 1.285z"></path>
                            </svg> В наявності
                        </span>
                    </div>
                @else
                    <div class="p-3 mb-1">
                        <span class="py-1 d-inline-flex rounded text-danger font-weight-600 fs-14px" style="background: #f2f2f2;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="17" class="fill-danger me-1" style="fill: red;">
                                <path
                                    d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 13 24 L 13 26 L 37 26 L 37 24 L 13 24 z"></path>
                            </svg>
                            Немає в наявності
                        </span>
                    </div>
                @endif

                @if($product->in_stock == 0)

                @else
                <div class=" p-3 mb-1">
                    <div class="text-gray">Ціна за 1 кг</div>
                    <div class="price">
                        <span class="current fs-20px black">{{ $product->price }} <span>грн</span></span>
                    </div>
                </div>
                <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post"
                      class="form-inline add-to-basket">
                    @csrf
                    <div class="mb-1">
                        <div class="row d-flex align-items-center">
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3 pe-0">
                                <div class="text-gray">Кількість</div>

                                <div class="quantity-changer">
                                    <div class="d-flex">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="input-group-text minus px-2"
                                                        data-input-id="minus-{{ $product->id }}">
                                                    <img class="icon-cart" width="16" height="16"
                                                         src="{{ asset('img/minus.svg') }}">
                                                </button>
                                            </div>
                                            <input type="text" class="form-control only-float inp-quantity quantity"
                                                   value="1" name="quantity" data-step="1" data-minimum="1"
                                                   id="input-quantity-{{ $product->id }}"
                                                   data-product-id="{{ $product->id }}">
                                            <div class="input-group-append">
                                                <button type="button" class="input-group-text plus px-2"
                                                        data-input-id="input-{{ $product->id }}">
                                                    <img class="icon-cart" width="16" height="16"
                                                         src="{{ asset('img/plus.svg') }}">
                                                </button>
                                            </div>
                                            <div class="text-gray fs-12px text-center w-100 font-montserrat">мін. кільк.
                                                1кг
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-6 col-md-3 col-xl-3 px-0 text-center">
                                <div class="text-gray">Сума</div>
                                <div
                                    class="mt-2 total-price-calc fs-18px font-weight-600 white-space-nowrap total-price-calc">
                                    <span class="sum" data-input-id="sum-{{ $product->id }}"
                                          data-price="{{ $product->price }}">{{ $product->price }}</span>

                                </div>

                            </div>

                            <div class="col col-lg-5 d-flex align-items-end mt-2 mt-mb-0 ps-md-0">
                                <button type="submit" class="btn btn-to-cart cart-add px-4 flex-fill"
                                        data-input-id="input-{{ $product->id }}" data-product-id="{{ $product->id }}">
                                    <img class="icon-cart" width="20" height="20" src="{{ asset('img/cart.svg') }}">
                                    <span style="margin-left: 5px">Купити</span></button>
                            </div>
                        </div>
                    </div>
                </form>

                @endif


            </div>
        </div>

    </section>

    <div class="products-viewed__title mt-5">Схожі товари</div>


    <div class="col-lg-12 products-block order-1 order-lg-2 ps-lg-0  mb-5">


        <div class="products-block-container mt-4">
            <div class="col-lg-12 products-block order-1 order-lg-2 ps-lg-0">
                <div class="row products-gutter-1px products-row">
                    @foreach ($relatedProducts as $product)
                        @include('catalog.part.product', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

