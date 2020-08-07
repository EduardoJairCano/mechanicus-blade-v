@extends('home')

@section('title', 'Editar usuario')

@section('card-title', 'Editar usuario')

@section('content')

    <form method="POST" action="{{ route('userInfo.update', $user) }}">

        @method('PATCH')

        @include('userInfo._form',
            [
                'routeToReturn' => 'userInfo.index',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
