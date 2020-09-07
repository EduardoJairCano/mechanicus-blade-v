<table class="table text-black-50 text-center" style="font-size: small">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Domicilio</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>
                <a href="{{ route('company.show', $company) }}"
                   title="Ver Compañia a detalle">
                    {{ $company->name }}
                </a>
            </td>
            <td>{{ $company->address->street_address . ' ' . $company->address->outdoor_number . ' ' . $company->address->interior_number }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="{{ route('company.edit', $company) }}"
                       title="Editar Compañia"
                       class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    {{--@can('deleteCompany', $company)
                        <a href="#" onclick="document.getElementById('delete-company').submit()"
                           title="Eliminar Compañia"
                           class="btn btn-danger">
                            <i class="fa fa-close"></i>
                        </a>
                        <form id="delete-company"
                              method="POST"
                              action="{{ route('company.destroy', $company) }}"
                              class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    @endcan--}}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
