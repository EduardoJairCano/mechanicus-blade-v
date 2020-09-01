@extends('home')

@section('title', 'Editar Administrador')

@section('card-title', 'Editar Administrador')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <h3 class="col-md-8 col-sm-8">
            <span class="font-weight-bold">
                Información Principal
            </span>
        </h3>
        <div class="col-md-3 col-sm-4 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route' => 'userInfo.index',
                    'title' => 'Regresar a Panel de Usuario',
                    'message' => 'Regresar'
                ]
            )
        </div>
    </div>

    <hr>

    {{-- Edit userInfo form --}}
    <form method="POST" action="{{ route('administrator.update', $administrator) }}">
        @method('PATCH')
        @include('administrators.partials._form', ['btnText' => 'Actualizar'])
    </form>

@endsection
