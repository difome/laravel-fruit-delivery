@extends('layout.site', ['title' => $page->name])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">{{ $page->name }}</li>

            </ol>
        </div>
    </nav>
    <article class="article-single">
        <div class="article-single__row">
            <div class="article-single__head">
                <div class="article-single__box-border">
                    <div class="pagehead-container">
                        <h1 class="pagehead-container__header">{{ $page->name }}</h1>
                    </div>
                    <div class="article-single__body">
                        <p>{!! $page->content  !!}</p>
                    </div>
                </div>
            </div>
        </div>

    </article>

@endsection
