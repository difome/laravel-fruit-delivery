@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Найменування"
           required maxlength="100" value="{{ old('name') ?? $item->name ?? '' }}">
</div>
<div class="form-group">
    @php
        $current = old('timezone') ?? $item->timezone ?? 'UTC';
    @endphp
    <select name="timezone" class="form-control" title="Тимчасова зона">
        <option value="UTC">Оберіть</option>
        @foreach ($timezones as $key => $value)
            <option value="{{ $key }}"@if($current == $key) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
           required maxlength="100" value="{{ old('slug') ?? $item->slug ?? '' }}">
</div>
<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Короткий опис" maxlength="200"
              rows="3">{{ old('content') ?? $item->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Зберегти</button>
</div>
