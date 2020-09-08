@extends('home')

@section('title', 'Agregar Administrador')

@section('card-title', 'Agregar Administrador')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <h4 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información Principal
            </span>
        </h4>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'     => 'userInfo.index',
                    'title'     => 'Regresar a Panel de Usuario',
                    'message'   => 'Regresar'
                ]
            )
        </div>
    </div>

    <hr>

    {{-- Create Administrator(userInfo) info form --}}
    <form method="POST" action="{{ route('administrator.store') }}">
        @include('administrators.partials._form', ['btnText' => 'Guardar'])
    </form>

@endsection
