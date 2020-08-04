<div class="card-header border-0 font-weight-bold"> Navegación </div>

<div class="card-body">
    <ul class="list-group">
        <li class="list-group-item border-0 mb-2 shadow-sm">
            <a href="{{ route('home') }}" class="text-secondary">
                <span class="font-weight-bold">
                    Panel de Usuario
                </span>
            </a>
        </li>
        @auth
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="{{ route('customers.index') }}" class="text-secondary">
                    <span class="font-weight-bold">
                        Clientes
                    </span>
                </a>
            </li>
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="" class="text-secondary">
                    <span class="font-weight-bold">
                        Compañias
                    </span>
                </a>
            </li>
            <li class="list-group-item border-0 mb-2 shadow-sm">
                <a href="" class="text-secondary">
                    <span class="font-weight-bold">
                        Vehiculos
                    </span>
                </a>
            </li>
        @endauth
        <li class="list-group-item border-0 mb-2 shadow-sm">
            <a href="{{ route('about') }}" class="text-secondary">
                <span class="font-weight-bold">
                    Acerca de
                </span>
            </a>
        </li>
    </ul>
</div>
