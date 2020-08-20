@extends('home')

@section('title', 'Editar Administrador')

@section('card-title', 'Editar Administrador')

@section('content')

    <form method="POST" action="{{ route('administrator.update', $administrator) }}">

        @method('PATCH')

        {{-- Create/Edit userInfo form --}}
        @include('administrators.partials._form',
            [
                'routeToReturn' => 'userInfo.index',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
