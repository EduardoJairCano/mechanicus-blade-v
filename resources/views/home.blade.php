@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">

        {{-- Left Navigation --}}
        <div class="col-md-3">
            <div class="card">
                {{ view('partials.left-navigation') }}
            </div>
        </div>

        {{-- Content --}}
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> @yield('card-title') </div>

                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
