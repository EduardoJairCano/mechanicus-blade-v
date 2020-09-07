@extends('home')

@section('title', 'Compañia | ' . $company->name)

@section('card-title', 'Información de la Compañia')

@section('content')

    {{-- Header & Action section --}}
    <div class="row align-items-center">
        <div class="col-md-8 col-sm-7">
            <div class="row col-md-12">
                <h3 class="font-weight-bold text-primary">
                    {{ $company->name }}
                </h3>
            </div>
            <div class="row col-md-12">
                <span>
                    {{ $company->customer->first_name . ' ' . $company->customer->last_name }}
                </span>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 d-flex justify-content-end">
            <a href="{{--{{ route('vehicle.edit', $vehicle) }}--}}" class="btn btn-primary">
                Editar
            </a>
        </div>
       {{-- @can('deleteCompany', $company)
            <div class="col-md-2 col-sm-2">
                <a href="#" onclick="document.getElementById('delete-company').submit()"
                   title="Eliminar Compañia"
                   class="btn btn-danger">
                    Eliminar
                </a>
                <form id="delete-company"
                      method="POST"
                      action="{{ route('company.destroy', $company) }}"
                      class="d-none">
                    @csrf @method('DELETE')
                </form>
            </div>
        @endcan--}}
    </div>

    <hr>

    {{-- Company info section --}}
    <div>
        @include('companies.partials.show_company_info', compact('company'))
    </div>

    {{-- Return button --}}
    <div class="row">
        <div class="col-md-1 offset-10 d-flex justify-content-end">
            @include('helpers.html-elements.buttons.aHref',
                [
                    'route'             => 'customer.show',
                    'obj'               => $company->customer,
                    'title'             => 'Regresar a Información de Cliente',
                    'message'           => 'Regresar'
                ]
            )
        </div>
    </div>

@endsection
