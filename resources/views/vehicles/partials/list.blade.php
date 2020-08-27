<table class="table text-black-50 text-center" style="font-size: small">
    <thead>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Año</th>
        <th>Cliente</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicle)
        <tr>
            <td>
                <a href="{{--{{ route('customer.show', $customer) }}--}}">
                    {{ $vehicle->plate }}
                </a>
            </td>
            <td>{{ $vehicle->make }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>{!! $vehicle->owner ? $vehicle->owner->first_name . ' ' . $vehicle->owner->last_name : '' !!}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="{{--{{ route('customer.edit', $customer) }}--}}" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    {{--@can('deleteCustomer', $customer)--}}
                        <a href="#" onclick="document.getElementById('delete-vehicle').submit()" class="btn btn-danger">
                            <i class="fa fa-close"></i>
                        </a>
                        {{--<form id="delete-customer"
                              method="POST"
                              action="{{ route('customer.destroy', $customer) }}"
                              class="d-none">
                            @csrf @method('DELETE')
                        </form>--}}
                    {{--@endcan--}}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
