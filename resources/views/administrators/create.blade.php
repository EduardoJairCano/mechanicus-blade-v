@extends('layouts.app')

@section('main-content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0">
                    <div class="card-header border-0">
                        <span class="font-weight-bold">
                            Información General del Administrador
                        </span>
                    </div>

                    <div class="card-body text-black-50">
                        <form method="POST" action="{{ route('administrator.store') }}">

                            @include('administrators._form',
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
