@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">

        {{-- Left Navigation --}}
        <div class="col-md-3">
            <div class="card shadow border-0">
                @include('partials.left-navigation')
            </div>
        </div>

        {{-- Content --}}
        <div class="col-md-9">
            <div class="card shadow border-0">
                <div class="card-header border-0"> @yield('card-title') </div>

                <div class="card-body text-black-50">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
