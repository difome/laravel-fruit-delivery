@extends('layout.site', ['title' => 'Перегляд елемента'])

@section('content')
    <h1>Перегляд елемента</h1>
    <p><strong>Назва:</strong> {{ $item->name }}</p>
    <p><strong>Тимчасова зона:</strong> {{ $item->timezone }}</p>
    <p><strong>ЧПУ (англ):</strong> {{ $item->slug }}</p>
    <p><strong>Опис</strong> {{ $item->content }}</p>
    <p><strong>Створено</strong> {{ $item->created_at }}</p>
    <p><strong>Виправлено</strong> {{ $item->updated_at }}</p>
    <a href="{{ route('item.edit', ['item' => $item->id]) }}"
       class="btn btn-success">
        Редагувати
    </a>
    <form method="post" class="d-inline" onsubmit="return confirm('Видалити цей елемент?')"
          action="{{ route('item.destroy', ['item' => $item->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Удалить
        </button>
    </form>
@endsection


