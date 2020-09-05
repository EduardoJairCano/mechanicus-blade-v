<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVehicleRequest;
use App\Http\Requests\UpdatedVehicleRequest;
use App\Models\Customer;
use App\Models\Vehicle;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Create a new customer controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'auth',
            'roles:dev,staff,owner,admin'
        ]);
    }

    /**
     * Display a listing of the vehicle.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $user = Auth::user();

        // Get all vehicles records for owner user
        $vehicles = $user->getUserVehicles();

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @param Customer|null $customer
     * @return Application|Factory|RedirectResponse|View
     */
    public function create(Customer $customer = null)
    {
        try {
            if ($customer) {
                // Validate for user logged to be owner of the customer
                $this->authorize('createVehicle', $customer);
            }

            $vehicle = new Vehicle();
            $customers = \auth()->user()->getUserCustomers();

            return view('vehicles.create', compact(['vehicle', 'customer', 'customers']));

        } catch (AuthorizationException $e) {

            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param SaveVehicleRequest $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function store(SaveVehicleRequest $request)
    {
        // Fields validations
        $fields = $request->validated();

        // Validation for existing user and role type to get the owner id
        $user = Auth::user();
        $ownerId = $user->getOwnerId();

        // Validate if the customer belongs to the owner
        $customer = Customer::find((int) $fields['customer_id']);

        if (isset($ownerId, $customer) && $ownerId === $customer->user_id) {
            // Create new vehicle row
            $vehicle = Vehicle::create([
                'plate'             => $fields['plate'],
                'serial_number'     => $fields['serial_number'],
                'make'              => $fields['make'],
                'model'             => $fields['model'],
                'year'              => $fields['year'],
                'engine'            => $fields['engine'],
                'cylinder_count'    => $fields['cylinder_count'],
                'transmission'      => $fields['transmission'],
                'drivetrain'        => $fields['drivetrain'],
                'fuel'              => $fields['fuel'],
                'color'             => $fields['color'],
                'slug'              => 'slug-space',
                'customer_id'       => $fields['customer_id'],
            ]);

            // Slug creation
            $vehicle->createSlug();

            return view('vehicles.show', ['vehicle' => $vehicle]);
        }

        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified vehicle.
     *
     * @param Vehicle $vehicle
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(Vehicle $vehicle)
    {
        try {
            // Validation for user logged and role type
            $this->authorize('showVehicle', $vehicle);

            return view('vehicles.show', compact('vehicle'));

        } catch (AuthorizationException $e) {

            return redirect()->route('vehicle.index');
        }
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param Vehicle $vehicle
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(Vehicle $vehicle)
    {
        try {
            // Validation for user logged and role type
            $this->authorize('editAndUpdateVehicle', $vehicle);

            return view('vehicles.edit', compact('vehicle'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param UpdatedVehicleRequest $request
     * @param Vehicle $vehicle
     * @return RedirectResponse
     */
    public function update(UpdatedVehicleRequest $request, Vehicle $vehicle): ?RedirectResponse
    {
        try {
            // Validation for user logged and role type
            $this->authorize('editAndUpdateVehicle', $vehicle);

            // Fields validations
            $fields = $request->validated();

            // Update vehicle info
            $vehicle->update([
                'plate'             => $fields['plate'],
                'serial_number'     => $fields['serial_number'],
                'make'              => $fields['make'],
                'model'             => $fields['model'],
                'year'              => $fields['year'],
                'engine'            => $fields['engine'],
                'cylinder_count'    => $fields['cylinder_count'],
                'transmission'      => $fields['transmission'],
                'drivetrain'        => $fields['drivetrain'],
                'fuel'              => $fields['fuel'],
                'color'             => $fields['color'],
            ]);

            // Update Slug
            $vehicle->createSlug();

            return redirect()->route('vehicle.show', $vehicle);

        } catch (AuthorizationException $e) {

            return redirect()->route('vehicle.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicle $vehicle
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Vehicle $vehicle): ?RedirectResponse
    {
        try {
            // Owner user validation
            $this->authorize('deleteVehicle', $vehicle);

            $vehicle->delete();

            return redirect()->route('vehicle.index');

        } catch (AuthorizationException $e) {

            return redirect()->route('vehicle.index');
        }
    }
}
