
@foreach ($items->where('parent_id', $parent) as $item)
    <p class="mb-2"><a href="{{ route('catalog.category', ['category' => $item->slug]) }}" class="black hover-success fs-13px">{{ $item->name }} </a></p>

@endforeach

