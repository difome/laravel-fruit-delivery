@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Найменування"
           required maxlength="100" value="{{ old('name') ?? $product->name ?? '' }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
           required maxlength="100" value="{{ old('slug') ?? $product->slug ?? '' }}">
</div>
<div class="form-group">
    <!-- ціна (грн) -->
    <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Ціна (грн.)"
           name="price" required value="{{ old('price') ?? $product->price ?? '' }}">
    <!-- новинка -->
    <div class="form-check form-check-inline">
        @php
            $checked = false; // створення нового товару
            if (isset($product)) $checked = $product->new; // редагування товару
            if (old('new')) $checked = true; // були помилки під час заповнення форми
        @endphp
        <input type="checkbox" name="new" class="form-check-input" id="new-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="new-product">Новинка</label>
    </div>
    <!-- лідер продажів -->
    <div class="form-check form-check-inline">
        @php
            $checked = false; // створення нового товару
            if (isset($product)) $checked = $product->hit; // редагування товару
            if (old('hit')) $checked = true; // були помилки під час заповнення форми
        @endphp
        <input type="checkbox" name="hit" class="form-check-input" id="hit-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="hit-product">Лідер продажів</label>
    </div>
    <!-- розпродаж -->
    <div class="form-check form-check-inline ">
        @php
            $checked = false; // створення нового товару
            if (isset($product)) $checked = $product->sale; // редагування товару
            if (old('sale')) $checked = true; // були помилки під час заповнення форми
        @endphp
        <input type="checkbox" name="sale" class="form-check-input" id="sale-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="sale-product">Розпродаж</label>
    </div>
</div>

<div class="form-check form-check-inline">
    @php
        $inStockValue = old('in_stock', isset($product) ? $product->in_stock : 1);
    @endphp

    <input type="radio" name="in_stock" class="form-check-input" id="in_stock_yes" value="1" @if($inStockValue == 1) checked @endif>
    <label class="form-check-label" for="in_stock_yes">В наявності</label>

    <input type="radio" name="in_stock" class="form-check-input ml-3" id="in_stock_no" value="0" @if($inStockValue == 0) checked @endif>
    <label class="form-check-label" for="in_stock_no">Немає в наявності</label>
</div>

<div class="form-group">
    @php
        $category_id = old('category_id') ?? $product->category_id ?? 0;
    @endphp
    <select name="category_id" class="form-control" title="Категорія">
        <option value="0">Оберіть</option>
        @if (count($items))
            @include('admin.product.part.branch', ['level' => -1, 'parent' => 0])
        @endif
    </select>
</div>

<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Опис"
              rows="4">{{ old('content') ?? $product->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept=".png, .jpeg, .webp, .jpg">
</div>
@isset($product->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Видалити завантажене зображення
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-primary">Зберегти</button>
</div>
