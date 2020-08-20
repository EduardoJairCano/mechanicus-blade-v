<table class="table text-black-50 text-center" style="font-size: small">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Teléfono Móvil</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>
                <a href="{{ route('customer.show', $customer) }}">
                    {{ $customer->first_name . ' ' . $customer->last_name }}
                </a>
            </td>
            <td>{{ $customer->rfc }}</td>
            <td>{{ $customer->cell_phone_number }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="{{ route('customer.edit', $customer) }}" class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    @if (auth()->user()->hasRole(['owner']))
                        <a href="#" onclick="document.getElementById('delete-customer').submit()" class="btn btn-danger">
                            <i class="fa fa-close"></i>
                        </a>
                        <form id="delete-customer"
                              method="POST"
                              action="{{ route('customer.destroy', $customer) }}"
                              class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
