@csrf

{{-- Select or Create Customer section --}}
<div>
    @include('vehicles.partials.select_or_create_customer',
        [
            'customers' => $customers,
            'routeToReturn' => 'vehicle.index',
        ]
    )
</div>

{{-- New vehicle info inputs --}}
<div>
    {{-- Header --}}
    <div class="form-group row align-items-center">
        <h4 class="col-md-7">
            <span class="font-weight-bold">
                Información del Vehículo
            </span>
        </h4>
    </div>

    <hr class="pb-2">

    {{-- PLate & Serial Number(optional) --}}
    <div class="form-group row align-items-center">
        <label for="plate" class="col-md-2 col-form-label text-md-right"> Placa </label>
        <div class="col-md-2">
            <input type="text"
                   id="plate"
                   name="plate"
                   class="form-control bg-light shadow-sm @error('plate') is-invalid @else border-0 @enderror"
                   value="{{ old('plate', $vehicle->plate) }}">
            @error('plate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label for="serial_number" class="col-md-4 col-form-label text-md-right"> Número de Serie (opcional) </label>
        <div class="col-md-3">
            <input type="text"
                   id="serial_number"
                   name="serial_number"
                   class="form-control bg-light shadow-sm border-0 "
                   value="{{ old('serial_number', $vehicle->plate) }}">
        </div>
    </div>

    {{-- Make & Model --}}
    <div class="form-group row align-items-center">
        <label for="make" class="col-md-2 col-form-label text-md-right"> Marca </label>
        <div class="col-md-3">
            <input type="text"
                   id="make"
                   name="make"
                   class="form-control bg-light shadow-sm @error('make') is-invalid @else border-0 @enderror"
                   value="{{ old('make', $vehicle->make) }}">
            @error('make')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label for="model" class="col-md-2 col-form-label text-md-right"> Modelo </label>
        <div class="col-md-4">
            <input type="text"
                   id="model"
                   name="model"
                   class="form-control bg-light shadow-sm @error('model') is-invalid @else border-0 @enderror"
                   value="{{ old('model', $vehicle->model) }}">
            @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Year & Transmission --}}
    <div class="form-group row align-items-center">
        <label for="year" class="col-md-2 col-form-label text-md-right"> Año </label>
        <div class="col-md-2">
            <input type="text"
                   id="year"
                   name="year"
                   class="form-control bg-light shadow-sm @error('year') is-invalid @else border-0 @enderror"
                   value="{{ old('year', $vehicle->year) }}">
            @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label for="transmission" class="col-md-3 col-form-label text-md-right"> Tipo de Transmisión </label>
        <div class="col-md-4">
            <select id="transmission"
                    name="transmission"
                    class="form-control bg-light shadow-sm @error('transmission') is-invalid @else border-0 @enderror">
                <option value="{{ old('transmission', $vehicle->transmission) ?? '' }}">
                    {{ old('transmission', $vehicle->transmission) ?? 'Seleccione una opción' }}
                </option>
                <option value="manual">Manual</option>
                <option value="automatic">Automática</option>
                <option value="automated">Automatizada o Secuencial</option>
                <option value="cvt">CVT</option>
            </select>
            @error('transmission')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Engine & Cylinder Count --}}
    <div class="form-group row align-items-center">
        <label for="engine" class="col-md-2 col-form-label text-md-right"> Motor </label>
        <div class="col-md-2">
            <input type="text"
                   id="engine"
                   name="engine"
                   class="form-control bg-light shadow-sm @error('engine') is-invalid @else border-0 @enderror"
                   value="{{ old('engine', $vehicle->engine) }}">
            @error('engine')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label for="cylinder_count" class="col-md-3 col-form-label text-md-right"> Número de Cilindros </label>
        <div class="col-md-3">
            <select id="cylinder_count"
                    name="cylinder_count"
                    class="form-control bg-light shadow-sm @error('cylinder_count') is-invalid @else border-0 @enderror">
                <option value="{{ old('cylinder_count', $vehicle->cylinder_count) ?? '' }}">
                    {{ old('cylinder_count', $vehicle->cylinder_count) ?? 'Seleccione una opción' }}
                </option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="8">8</option>
                <option value="10">10</option>
                <option value="12">12</option>
                <option value="16">16</option>
            </select>
            @error('cylinder_count')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Color(optional) & Drivetrain(optional) --}}
    <div class="form-group row align-items-center">
        <label for="color" class="col-md-2 col-form-label text-md-right"> Color </label>
        <div class="col-md-3">
            <input type="text"
                   id="color"
                   name="color"
                   class="form-control bg-light shadow-sm border-0"
                   value="{{ old('color', $vehicle->color) }}">
        </div>

        <label for="drivetrain" class="col-md-2 col-form-label text-md-right"> Tracción (opcional) </label>
        <div class="col-md-4">
            <select id="drivetrain"
                    name="drivetrain"
                    class="form-control bg-light shadow-sm border-0">
                <option value="{{ old('drivetrain', $vehicle->drivetrain) ?? '' }}">
                    {{ old('drivetrain', $vehicle->drivetrain) ?? 'Seleccione una opción' }}
                </option>
                <option value="FWD">(FWD) Delantera</option>
                <option value="RWD">(RWD) Trasera</option>
                <option value="AWD">(AWD) Total Permanente</option>
                <option value="4WD">(4WD) Total No Permamente</option>
                <option value="4X4">(4X4) 4 Ruedas Total</option>
            </select>
        </div>
    </div>

    {{-- Fuel --}}
    <div class="form-group row align-items-center">
        <label for="fuel" class="col-md-2 col-form-label text-md-right"> Combustible </label>
        <div class="col-md-4">
            <select id="fuel"
                    name="fuel"
                    class="form-control bg-light shadow-sm @error('fuel') is-invalid @else border-0 @enderror">
                <option value="{{ old('fuel', $vehicle->fuel) ?? '' }}">
                    {{ old('fuel', $vehicle->fuel) ?? 'Seleccione una opción' }}
                </option>
                <option value="gasoline"> Gasolina </option>
                <option value="diesel"> Diesel </option>
                <option value="gas"> Gas natural </option>
                <option value="gas_lp"> Gas LP </option>
                <option value="electric"> Eléctrico </option>
                <option value="hydrogen"> Hidrógeno </option>
                <option value="etanol"> Etanol </option>
                <option value="bioetanol"> Bioetanol </option>
                <option value="biodiesel"> Biodiesel </option>
            </select>
            @error('fuel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

{{-- Button section --}}
<div class="col-md-3 offset-md-8">
    <button type="submit" class="btn btn-primary btn-block">
        {{ $btnText }}
    </button>
</div>
