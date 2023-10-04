<!-- ціна (грн) -->
{{--<select name="price" class="form-control d-inline w-25 mr-4" title="Цена">--}}
{{--    <option value="0">Виберіть ціну</option>--}}
{{--    <option value="min"@if(request()->price == 'min') selected @endif>Дешеві товари</option>--}}
{{--    <option value="max"@if(request()->price == 'max') selected @endif>Дорогие товары</option>--}}
{{--</select>--}}




<div class="d-flex justify-content-end">
    <div class="dropdown">
        <a class="sort-p btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Сортування
        </a>

        <ul class="dropdown-menu">
            <li class="dropdown-item {{ Request::input('price') === 'popular' ? 'active' : '' }}">
                <a href="{{ request()->fullUrlWithQuery(['price' => 'price']) }}">По популярності</a>
            </li>
            <li class="dropdown-item {{ Request::input('price') === 'max' ? 'active' : '' }}">
                <a href="{{ request()->fullUrlWithQuery(['price' => 'max']) }}">Від дорогих до дешевих</a>
            </li>
            <li class="dropdown-item {{ Request::input('price') === 'min' ? 'active' : '' }}">
                <a href="{{ request()->fullUrlWithQuery(['price' => 'min']) }}">Від дешевих до дорогих</a>
            </li>
        </ul>
    </div>

</div>



<!-- новинка -->
<div class="form-check form-check-inline">
    <input type="checkbox" name="new" class="form-check-input" id="new-product"
           @if(request()->has('new')) checked @endif value="yes">
    <label class="form-check-label" for="new-product">Новинка</label>
</div>
<!-- лідер продажів -->
<div class="form-check form-check-inline">
    <input type="checkbox" name="hit" class="form-check-input" id="hit-product"
           @if(request()->has('hit'))  checked @endif value="yes">
    <label class="form-check-label" for="hit-product">Лідер продажів</label>
</div>
<!-- розпродаж -->
<div class="form-check form-check-inline ">
    <input type="checkbox" name="sale" class="form-check-input" id="sale-product"
           @if(request()->has('sale'))  checked @endif value="yes">
    <label class="form-check-label" for="sale-product">Розпродаж</label>
</div>
<button type="submit" class="btn btn-light">Фільтрувати</button>

