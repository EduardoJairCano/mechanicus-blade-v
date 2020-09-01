@extends('home')

@section('title', 'Usuario | ' . $user->userInfo->first_name . ' ' . $user->userInfo->last_name )

@section('card-title', 'Información del Usuario')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-8 col-sm-8">
            <div class="row col-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $user->userInfo->first_name . ' ' . $user->userInfo->last_name }}
                </h3>
            </div>
            <div class="row col-12">
                <span>
                    {{ $user->email }}
                </span>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route' => 'userInfo.edit',
                    'obj' => $user,
                    'classForButton' => 'btn btn-primary',
                    'title' => 'Editar Usuario',
                    'message' => 'Editar'
                ]
            )
        </div>
    </div>

    <hr>

    {{-- User Info section --}}
    @include('userInfo.partials.show_user_info', compact($user))

    {{-- Administrators list section --}}
    @if (auth()->user()->isOwner())
        <hr class="pb-4">

        @include('administrators.partials.enlist', compact('subUsers'))
    @endif

    {{-- Return button --}}
    <div class="row pb-2">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route' => 'home',
                    'title' => 'Regresar a página principal',
                    'message' => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection
