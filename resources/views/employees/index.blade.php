@extends('home')

@section('title', 'Empleados')

@section('card-title', 'Empleados')

@section('content')
    {{-- Header & Action section --}}
    <div class="row align-items-center pb-4">
        <div class="col-md-6 offset-1">
            <div class="row col-md-12">
                <h4 class="font-weight-bold text-primary">
                    Empleados
                </h4>
            </div>
            <div class="row col-md-6">
                <span class="">
                    Nombre del negocio
                </span>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end align-content-center">
            <a href="{{--{{ route('employee.create') }}--}}" class="btn btn-primary">
                <span class="">
                    Agregar nuevo empleado
                </span>
            </a>
        </div>
    </div>

    {{-- Employees list section --}}
    @if (false)
    {{--@if (count($employees) > 0)--}}
        <div class="row align-items-center pb-2">
            <div class="col-md-12">
                {{--@include('employee.partials.list', $employees)--}}
            </div>
        </div>
    @else
        <hr>
        <div class="row-cols-md-12 d-flex justify-content-center">
            <span class="text-center text-black-50">No hay empleados registrados aún</span>
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
