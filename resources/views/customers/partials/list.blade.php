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
                <a href="{{ route('customer.show', $customer) }}"
                   title="Ver Cliente a detalle">
                    {{ $customer->first_name . ' ' . $customer->last_name }}
                </a>
            </td>
            <td>{{ $customer->rfc }}</td>
            <td>{{ $customer->cell_phone_number }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="{{ route('customer.edit', $customer) }}"
                       title="Editar Cliente"
                       class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    @can('deleteCustomer', $customer)
                        <a href="#" onclick="document.getElementById('delete-customer').submit()"
                           title="Eliminar Cliente"
                           class="btn btn-danger">
                            <i class="fa fa-close"></i>
                        </a>
                        <form id="delete-customer"
                              method="POST"
                              action="{{ route('customer.destroy', $customer) }}"
                              class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
