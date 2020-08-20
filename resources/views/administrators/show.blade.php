@extends('home')

@section('title', 'Administrador | ' . $administrator->userInfo->first_name . ' ' . $administrator->userInfo->last_name )

@section('card-title', 'Información del Administrador')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-7 offset-1">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $administrator->userInfo->first_name . ' ' . $administrator->userInfo->last_name }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $administrator->email }}
                </span>
            </div>
        </div>
        <div class="col-md-2 d-flex justify-content-end">
            <a href="{{ route('administrator.edit', $administrator) }}" class="btn btn-primary">
                Editar
            </a>
        </div>
        <div class="col-md-2">
            <a href="#" onclick="document.getElementById('delete-administrator').submit()" class="btn btn-danger">
                Eliminar
            </a>
            <form id="delete-administrator"
                  method="POST"
                  action="{{ route('administrator.destroy', $administrator) }}"
                  class="d-none">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>

    <hr>

    {{-- User Info section --}}
    @include('userInfo.partials.show_user_info', ['user' => $administrator])

    {{-- Return button --}}
    <div class="row pb-2">
        <div class="col-md-1 offset-10">
            <a href="{{ route('userInfo.index') }}" class="d-flex justify-content-end">
                <span>
                    Regresar
                </span>
            </a>
        </div>
    </div>

@endsection
