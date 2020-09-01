<table class="table text-black-50 text-center" style="font-size: small">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono Móvil</th>
            <th>Correo Electrónico</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($administrators as $administrator)
        <tr>
            <td>
                <a href="{{ route('administrator.show', $administrator) }}"
                   title="Ver Administrador a detalle">
                    {!! $administrator->getFullName() !!}
                </a>
            </td>
            <td>{!! $administrator->getCellPhoneNumber() !!}</td>
            <td>{{ $administrator->email }}</td>
            <td>{{ $administrator->role->display_name }}</td>
            <td>
                <div class="btn-group-sm" role="group">
                    <a href="{{ route('administrator.edit', $administrator) }}"
                       title="Editar Administrador"
                       class="btn btn-primary">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    <a href="#" onclick="document.getElementById('delete-administrator').submit()"
                       title="Eliminar Administrador"
                       class="btn btn-danger">
                        <i class="fa fa-close"></i>
                    </a>
                    <form id="delete-administrator"
                          method="POST"
                          action="{{ route('administrator.destroy', $administrator) }}"
                          class="d-none">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
