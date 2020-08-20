@extends('home')

@section('title', 'Editar Usuario')

@section('card-title', 'Editar Usuario')

@section('content')

    <form method="POST" action="{{ route('userInfo.update', $user) }}">

        @method('PATCH')

        {{-- Create/Edit userInfo form --}}
        @include('userInfo.partials._form',
            [
                'routeToReturn' => 'userInfo.index',
                'btnText' => 'Actualizar'
            ]
        )

    </form>

@endsection
