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
    <div class="col-md-10 offset-1">
        <table class="table text-black-50">
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
                <tr>
                    @foreach($subUsers as $subUser)
                        <td>{!! $subUser->userInfo->first_name . ' ' . $subUser->userInfo->last_name !!}</td>
                        <td>{{ $subUser->userInfo->cell_phone_number }}</td>
                        <td>{{ $subUser->email }}</td>
                        <td>{{ $subUser->role->display_name }}</td>
                        <td>btn y btn </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row pb-2">
    <div class="col-md-1 offset-10">
        <a href="{{ route('home') }}" class="d-flex justify-content-end">
            <span>
                Regresar
            </span>
        </a>
    </div>
</div>
