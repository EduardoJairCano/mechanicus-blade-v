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

{{-- Button section --}}
<div class="col-md-3 offset-md-8">
    <button type="submit" class="btn btn-primary btn-block">
        {{ $btnText }}
    </button>
</div>
