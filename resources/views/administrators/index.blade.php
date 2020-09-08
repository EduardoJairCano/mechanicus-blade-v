@extends('home')

@section('title', 'Compañias')

@section('card-title', 'Compañias')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center pb-2">
        <div class="col-md-8 col-sm-8">
            <div class="row col-12">
                <h4 class="font-weight-bold text-primary">
                    Administradores
                </h4>
            </div>
            <div class="row col-12">
                <span>
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'administrator.create',
                    'classForButton'    => 'btn btn-primary',
                    'title'             => 'Agregar nuevo Administrador',
                    'message'           => 'Agregar'
                ]
            )
        </div>
    </div>

    {{-- Administrator list section --}}
    @if (count($administrators) > 0)
        <div class="row align-items-center p-2 py-4">
            @include('administrators.partials.list', $administrators)
        </div>
    @else
        <hr>
        <div class="row d-flex justify-content-center pb-2">
            <span class="text-center text-black-50">
                No hay administradores registrados aún
            </span>
        </div>
        <hr class="pb-4">
    @endif

    {{-- Return button --}}
    <div class="row pb-2">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'     => 'home',
                    'title'     => 'Regresar a Página Principal',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection