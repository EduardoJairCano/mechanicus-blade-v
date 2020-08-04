@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header border-0 text-black-50 font-weight-bold">
                    Registrar
                </div>

                <div class="card-body text-black-50">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> Correo electrónico </label>
                            <div class="col-md-6">
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Contraseña </label>
                            <div class="col-md-6">
                                <input type="password"
                                       id="password"
                                       name="password"
                                       class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror"
                                       required
                                       autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> Confirmar contraseña </label>
                            <div class="col-md-6">
                                <input type="password"
                                       id="password-confirm"
                                       name="password_confirmation"
                                       class="form-control bg-light shadow-sm border-0"
                                       required
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
