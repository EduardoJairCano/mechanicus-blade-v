@extends('home')

@section('title', 'Editar Administrador')

@section('card-title', 'Editar Administrador')

@section('content')

    <form method="POST" action="{{ route('administrator.update', $administrator) }}">

        @method('PATCH')

        @include('administrators._form',
            [
                'routeToReturn' => 'userInfo.index',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
