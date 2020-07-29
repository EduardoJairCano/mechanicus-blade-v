@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header"> Navegación </div>

                <div class="card-body">
                    <a href="{{ route('customers.index') }}">Clientes</a><br>
                    <a href="{{ route('about') }}">Acerca de</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> Panel de usuario </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                        {{ __('You are logged in!') }}

                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
