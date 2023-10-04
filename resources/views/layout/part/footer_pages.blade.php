@foreach ($pages->where('parent_id', 0) as $page)
        <p class="mb-2"><a href="{{ route('page.show', ['page' => $page->slug]) }}" target="_self" class="black hover-success fs-13px">{{ $page->name }}</a></p>
@endforeach
