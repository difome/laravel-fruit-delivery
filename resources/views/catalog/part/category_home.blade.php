{{--<div class="col-lg-3 col-6 mb-4">--}}
{{--    <div class="" style="box-shadow: none !important; background: transparent !important; border: none; position: relative">--}}
{{--        <div class="">--}}
{{--            @if ($category->image)--}}
{{--                @php($url = url('storage/catalog/category/thumb/' . $category->image))--}}
{{--                <img src="{{ $url }}" class="img-fluid rounded-circle" alt="">--}}
{{--            @else--}}
{{--                <img src="https://via.placeholder.com/250x250" class="img-fluid" alt="">--}}
{{--            @endif--}}
{{--            <div class="text-center d-flex align-items-center justify-content-center" style="background: transparent; border: none;  font-weight: 200 !important; height: 50px;">--}}
{{--                <a href="{{ route('catalog.category', ['category' => $category->slug]) }}" class="btn btn-success btn-category_list">{{ $category->name }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}


<div class="col-lg-3 col-6 mb-4 mt-3">
    <div class="row position-relative">
        <a href="{{ route('catalog.category', ['category' => $category->slug]) }}" class="px-5 py-3 m-0">
            @if ($category->image)
                @php($url = url('storage/catalog/category/thumb/' . $category->image))
                <img src="{{ $url }}" class="img-fluid rounded-circle" alt="">
            @else
                <img src="https://via.placeholder.com/250x250" class="img-fluid" alt="">
            @endif
        </a>


        <a class="btn btn-success btn-category_list mt-3"
           href="{{ route('catalog.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
    </div>
</div>
