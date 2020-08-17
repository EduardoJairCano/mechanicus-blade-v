<hr class="pb-4">

<div class="row align-items-center pb-4">
    <div class="col-md-6 offset-1">
        <h4 class="font-weight-bold text-primary">
            Sub Usuarios
        </h4>
    </div>
    <div class="col-md-4 d-flex justify-content-end">
        <a href="{{ route('administrator.create') }}" class="btn btn-primary">
            Agregar
        </a>
    </div>
</div>

<div class="row align-items-center pb-2">
    <div class="col-md-12">
        <table class="table text-black-50 text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono Movil</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($subUsers as $subUser)
                <tr>
                    <td>
                        <a href="{{ route('administrator.show', $subUser) }}">
                            {!! $subUser->userInfo->first_name . ' ' . $subUser->userInfo->last_name !!}
                        </a>
                    </td>
                    <td>{{ $subUser->userInfo->cell_phone_number }}</td>
                    <td>{{ $subUser->email }}</td>
                    <td>{{ $subUser->role->display_name }}</td>
                    <td>
                        <div class="btn-group-sm" role="group">
                            <a href="{{ route('administrator.edit', $subUser) }}" class="btn btn-primary">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a href="#" onclick="document.getElementById('delete-administrator').submit()" class="btn btn-danger">
                                <i class="fa fa-close"></i>
                            </a>
                            <form id="delete-administrator"
                                  method="POST"
                                  action="{{ route('administrator.destroy', $subUser) }}"
                                  class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
