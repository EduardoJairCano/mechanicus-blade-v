@extends('home')

@section('title', 'Usuario | ' . $user->userInfo->first_name . ' ' . $user->userInfo->last_name )

@section('card-title', 'Información del Usuario')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-7 offset-1">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $user->userInfo->first_name . ' ' . $user->userInfo->last_name }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $user->email }}
                </span>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <a href="{{ route('userInfo.edit', $user) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
    </div>

    <hr>

    {{-- User Info section --}}
    @include('userInfo.partials.show_user_info', [ 'user' => $user])

    {{-- Administrators list section --}}
    @if (auth()->user()->hasRole(['dev','staff','owner']))
        @include('administrators.list', ['subUsers' => $subUsers])
    @endif

    {{-- Return button --}}
    <div class="row pb-2">
        <div class="col-md-1 offset-10">
            <a href="{{ route('home') }}" class="d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        </div>
    </div>

@endsection
