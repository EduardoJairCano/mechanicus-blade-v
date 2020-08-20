@extends('home')

@section('title', 'Panel del Usuario')

@section('card-title', 'Panel del Usuario')

@section('content')
    {{-- Header & Action section --}}
    <div class="d-flex justify-content-end align-content-center">

    </div>

    <hr>

    {{-- User info section --}}
    <div class="col-md-12">
        @if (isset($user->userInfo))
            {{-- Show userInfo section --}}
            @include('userInfo.show',
                [
                    'user'      => $user,
                    'subUsers'  => $subUsers,
                ]
            )
        @else
            {{-- Complete userInfo section --}}
            <div class="row pb-3 justify-content-center">
                <span class="text-danger font-weight-bold">
                    Es necesario completar la información general del usuario
                </span>
            </div>

            <div class="row justify-content-center">
                <a href="{{ route('userInfo.create') }}" class="btn btn-primary">
                    <span class="">
                        Completar información
                    </span>
                </a>
            </div>
        @endif
    </div>

@endsection
