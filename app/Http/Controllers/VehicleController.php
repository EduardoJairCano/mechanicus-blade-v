<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
