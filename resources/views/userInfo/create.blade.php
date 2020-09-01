@extends('layouts.app')

@section('main-content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header border-0">
                        <span class="font-weight-bold">
                            Información General del Usuario
                        </span>
                    </div>
                    <div class="card-body text-black-50">
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

                        {{-- Create form --}}
                        <form method="POST" action="{{ route('userInfo.store') }}">
                            {{-- Create userInfo form --}}
                            @include('userInfo.partials._form',
                                [
                                    'btnText' => 'Guardar'
                                ]
                            )
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
