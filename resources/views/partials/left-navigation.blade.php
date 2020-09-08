<div class="card-header border-0 font-weight-bold"> Navegación </div>

<div class="card-body">
    <ul class="list-group">
        <li class="list-group-item border-0 mb-2 shadow-sm">
            <a href="{{ route('home') }}" class="text-secondary">
                <span class="font-weight-bold">
                    Mechanicus
                </span>
            </a>
        </li>
        @auth
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{ route('userInfo.index') }}" class="text-secondary">
                    <span class="font-weight-bold">
                        Panel de Usuario
                    </span>
                </a>
            </li>
            @if (auth()->user()->isOwner())
                <li class="list-group-item border-0 mb-2 shadow-sm">
                    <a href="{{ route('administrator.index') }}" class="text-secondary">
                        <span class="font-weight-bold">
                            Administradores
                        </span>
                    </a>
                </li>
            @endif
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{ route('customer.index') }}" class="text-secondary">
                    <span class="font-weight-bold">
                        Clientes
                    </span>
                </a>
            </li>
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{ route('company.index') }}" class="text-secondary">
                    <span class="font-weight-bold">
                        Compañias
                    </span>
                </a>
            </li>
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{ route('vehicle.index') }}" class="text-secondary">
                    <span class="font-weight-bold">
                        Vehiculos
                    </span>
                </a>
            </li>
            @if(auth()->user()->hasRole(['owner', 'admin']))
                <li class="list-group-item border-0 mb-2 shadow-sm">
                    <a href="{{ route('employee.index') }}" class="text-secondary">
                        <span class="font-weight-bold">
                            Empleados
                        </span>
                    </a>
                </li>
            @endif
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{--{{ route('employee.index') }}--}}" class="text-secondary">
                    <span class="font-weight-bold">
                        Configuración
                    </span>
                </a>
            </li>
        @endauth
        @guest
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{--{{ route('about') }}--}}" class="text-secondary">
                    <span class="font-weight-bold">
                        Contáctanos
                    </span>
                </a>
            </li>
        @endguest
        <li class="list-group-item border-0 mb-2 shadow-sm">
            <a href="{{ route('about') }}" class="text-secondary">
                <span class="font-weight-bold">
                    Acerca de
                </span>
            </a>
        </li>
    </ul>
</div>
