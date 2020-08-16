@extends('home')

@section('title', 'Editar Sub Usuario')

@section('card-title', 'Editar Sub Usuario')

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
