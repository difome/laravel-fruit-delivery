@extends('layout.site', ['title' => 'Личный кабинет'])

@section('content')
    <nav class="p-null breadcrumb" aria-label="breadcrumb">
        <div class="breadcrumb-wrap">
            <ol class="breadcrumb-ins">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Головна</a></li>

                <li class="breadcrumb-item">Особистий кабінет</li>

            </ol>
        </div>
    </nav>
    <h1>Особистий кабінет</h1>
    <h2 class="products-viewed__title">Особисті дані</h2>

    {{--    <div class="my-data-container">--}}
    {{--        <div class="tab-content">--}}
    {{--            <div class="tab-pane fade show active" id="profileView" role="tabpanel" aria-labelledby="profileView">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-md-3 my-data-item">--}}
    {{--                        <div class="my-data-item__label">Прізвище</div>--}}
    {{--                        <div class="my-data-item__value">{{ auth()->user()->last_name }}</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-3 my-data-item">--}}
    {{--                        <div class="my-data-item__label">Ім'я</div>--}}
    {{--                        <div class="my-data-item__value">{{ auth()->user()->last_name }}</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-3 my-data-item">--}}
    {{--                        <div class="my-data-item__label">Email</div>--}}
    {{--                        <div class="my-data-item__value">{{ auth()->user()->email }}</div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-3 my-data-item">--}}
    {{--                        <div class="my-data-item__label">Телефон</div>--}}
    {{--                        <div class="my-data-item__value">--}}
    {{--                            @if(auth()->user()->phone)--}}
    {{--                                {{ auth()->user()->phone }}--}}
    {{--                            @else--}}
    {{--                                ---}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="my-data-controls nav">--}}
    {{--                        <button class="btn btn-sm btn_ghost btn-edit d-flex align-items-center" data-bs-toggle="tab" data-bs-target="#profileEdit" type="button" role="tab">--}}
    {{--                            <span class="icn">--}}
    {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">--}}
    {{--                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>--}}
    {{--                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>--}}
    {{--                            </svg>--}}
    {{--                            </span>--}}

    {{--                            Редагувати</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}


    <div class="my-data-container">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="profileView" role="tabpanel" aria-labelledby="profileView">

                <div class="row">
                    <div class="col-md-3 my-data-item">
                        <div class="my-data-item__label">Прізвище</div>
                        <div class="my-data-item__value">{{ auth()->user()->last_name }}</div>
                    </div>
                    <div class="col-md-3 my-data-item">
                        <div class="my-data-item__label">Ім'я</div>
                        <div class="my-data-item__value">{{ auth()->user()->first_name }}</div>
                    </div>
                    <div class="col-md-3 my-data-item">
                        <div class="my-data-item__label">Email</div>
                        <div class="my-data-item__value">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="col-md-3 my-data-item">
                        <div class="my-data-item__label">Телефон</div>
                        <div class="my-data-item__value">
                            @if(auth()->user()->phone)
                                {{ auth()->user()->phone }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                    <div class="my-data-controls nav">
                        <button id="editButton" class="btn btn-sm btn_ghost btn-edit d-flex align-items-center" data-bs-toggle="tab" data-bs-target="#profileEdit" type="button" role="tab" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </span>
                            Редагувати</button>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profileEdit" role="tabpanel" aria-labelledby="profileEdit">
                <form id="w1" action="{{ route('user.profile.update') }}" method="post">

                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="forms__item">
                                <div class="form-floating field-accountform-last_name required">
                                    <input type="text" id="accountform-last_name" class="form-control"
                                           name="last_name" value="{{ old('first_name', auth()->user()->first_name) }}"
                                           aria-required="true">
                                    <label class="control-label" for="accountform-last_name">Прізвище</label>

                                    @if ($errors->has('first_name'))
                                        <p class="help-block help-block-error">{{ $errors->first('first_name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="forms__item">
                                <div class="form-floating field-accountform-first_name required">
                                    <input type="text" id="accountform-first_name" class="form-control"
                                           name="first_name" value="{{ old('last_name', auth()->user()->last_name) }}"
                                           aria-required="true">
                                    <label class="control-label" for="accountform-first_name">Ім'я</label>

                                    @if ($errors->has('last_name'))
                                        <p class="help-block help-block-error">{{ $errors->first('last_name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="forms__item">
                                <div class="form-floating field-accountform-email required">
                                    <input type="text" id="accountform-email" class="form-control"
                                           name="email" value="{{ old('email', auth()->user()->email) }}"
                                           aria-required="true">
                                    <label class="control-label" for="accountform-email">Email</label>

                                    @if ($errors->has('email'))
                                        <p class="help-block help-block-error">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="forms__item">
                                <div class="form-floating field-accountform-phone">
                                    <input type="text" id="accountform-phone" class="form-control"
                                           name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                    <label class="control-label" for="accountform-phone">Телефон</label>

                                    @if ($errors->has('phone'))
                                        <p class="help-block help-block-error">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="my-data-controls my-data-controls_with-border nav mt-3">
                            <button class="btn btn-sm btn-secondary btn_download me-3 mx-3" type="submit">Зберегти</button>
                            <button class="btn btn-sm btn_ghost btn-cansel active" id="cancelButton" type="button" data-bs-toggle="tab"
                                    data-bs-target="#profileView" role="tab" aria-selected="true">Відмінити
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <a class="mt-3  mb-3 d-flex align-items-center" href="{{ route('user.order.index') }}">
        <span class="icn text-muted">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
     viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                </svg>
        </span>
        <span class="text-dark">Ваші замовлення</span>
    </a>

    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Вийти</button>
    </form>
@endsection
