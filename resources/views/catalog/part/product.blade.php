<div class="col-6 col-after360-6 col-sm-6 col-md-4 col-lg-3 col-xl-2_5 one-product">
    <div class="product short-product" data-product-id="{{ $product->id }}" data-cart-product-id="{{ $product->id }}">
    <span itemscope="" itemtype="http://schema.org/ImageObject">
        <meta itemprop="name" content="{{ $product->name }}">
        <meta itemprop="contentUrl" content="{{ asset('storage/catalog/product/source/' . $product->image) }}">
        <meta itemprop="description" content="{{ $product->name }}">
    </span>
        <div class="image">
            <a href="{{ route('catalog.product', ['product' => $product->slug]) }}">
                @if ($product->image)
                    @php($url = url('storage/catalog/product/thumb/' . $product->image))
                    <img
                            class="img-fluid"
                            data-src="{{ $url }}"
                            src="{{ $url }}"
                            alt="{{ $product->name }}">
                @else
                    <img    class="img-fluid"
                            data-src="https://via.placeholder.com/250x250"
                            src="https://via.placeholder.com/250x250"
                            alt="{{ $product->name }}">
                @endif

            </a>
        </div>

        <div class="name mb-2"><a href="{{ route('catalog.product', ['product' => $product->slug]) }}">{{ $product->name }}</a></div>
        @if($product->in_stock == 0)
            <div class="h-100 d-flex align-items-center mb-2 pb-sm-1">
                <div class="w-100 px-2 py-1 rounded text-danger fs-14px" style="background: #f2f2f2;">Немає в наявності</div>
            </div>
        @else
        <div class="price-one-unit font-montserrat mb-2 pb-sm-1 mt-auto">
            <div class="fs-14px text-gray">
                ціна за 1 кг
            </div>
            <div class="white-space-nowrap">
            <span class="black fs-16px">
                {{ $product->price }} <span class="fs-12px">грн</span>
            </span>
            </div>
        </div>


        <form action="{{ route('basket.add', ['id' => $product->id]) }}" method="post" class="form-inline add-to-basket">
            @csrf
            <div class="mt-auto d-flex flex-column flex-sm-row">
                <div class="quantity-changer order-1 order-sm-0 mt-1 mt-sm-0">
                    <div class="d-flex align-items-center w-100 ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text minus px-2" data-input-id="minus-{{ $product->id }}">
                                    <img class="icon-cart" width="16" height="16" src="{{ asset('img/minus.svg') }}">
                                </button>
                            </div>
                            <input type="text" class="form-control only-float inp-quantity quantity" value="1"  name="quantity" data-step="1" data-minimum="1" id="input-quantity-{{ $product->id }}" data-product-id="{{ $product->id }}">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text plus px-2" data-input-id="input-{{ $product->id }}">
                                    <img class="icon-cart" width="16" height="16" src="{{ asset('img/plus.svg') }}">
                                </button>
                            </div>
                            <div class="text-gray fs-12px text-center w-100 font-montserrat">мін. кільк. 1кг</div>
                        </div>
                        <div class="fs-12px ms-1 mb-3 font-montserrat text-gray">кг</div>
                    </div>
                </div>
                <div class="ms-sm-2 total-price-calc font-montserrat flex-grow-1  text-sm-center order-0 order-sm-1" style="line-height: 1.2rem">
                    <div class="fs-14px text-gray">
                        сума
                    </div>
                    <span class="white-space-nowrap black font-weight-600 fs-16px">
                <span class="sum" data-input-id="sum-{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->price }}</span>
                <span class="fs-12px d-sm-none">грн</span>
            </span>
                </div>
            </div>
            <div class="text-center mt-2 mx-0 w-100 mb-3">
                <button type="submit" class="btn btn-to-cart mt-2 w-100 cart-add" data-input-id="input-{{ $product->id }}" data-product-id="{{ $product->id }}">
                    <img class="icon-cart" width="20" height="20" src="{{ asset('img/cart.svg') }}">
                    Купити
                </button>
            </div>
        </form>
        @endif


            <div class="right-marks">
                @if($product->new)
                    <span class="new mx-1 mb-1">Новинка</span>
                @endif
                @if($product->hit)
                    <span class="top-of-sale mx-1 mb-1">Лідер продажів</span>
                @endif
                @if($product->sale)
                    <span class="new mx-1 mb-1">Розпродаж</span>
                @endif
            </div>
        <div class="left-marks">
            <div class="break"></div>
            <div class="break"></div>
        </div>
    </div>
</div>


