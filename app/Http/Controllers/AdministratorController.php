<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Address;
use App\Models\Pivots\AssignedOwner;
use App\Models\UserInfo;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdministratorController extends Controller
{
    /**
     * Create a new administrator controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'auth',
            'roles:dev,staff,owner'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new administrator.
     *
     * @return Application|Factory|RedirectResponse|View|null
     */
    public function create()
    {
        try {
            $administrator = new User();

            // Owner user validation
            $this->authorize('createAdministrator', $administrator);

            return view('administrators.create', compact('administrator'));

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }

    /**
     * Store a newly created administrator in storage.
     *
     * @param SaveAdministratorRequest $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function store(SaveAdministratorRequest $request)
    {
        try {
            $user = Auth::user();
            $administrator = new User();

            // Owner user validation
            $this->authorize('createAdministrator', $administrator);

            // Fields validations
            $fields = $request->validated();

            // Create new user row
            $administrator->email       = $fields['email'];
            $administrator->password    = Hash::make('admin1234');
            $administrator->role_id     = 4;
            $administrator->save();

            // Create new owner-user row
            AssignedOwner::create([
                'owner_id'           => $user->id,
                'user_id'            => $administrator->id,
            ]);

            // Create new user_info row
            UserInfo::create([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'cell_phone_number' => $fields['cell_phone_number'],
                'user_id'           => $administrator->id,
            ]);

            // Create new address row
            Address::create([
                'street_address'    => $fields['street_address'],
                'outdoor_number'    => $fields['outdoor_number'],
                'interior_number'   => $fields['interior_number'],
                'colony'            => $fields['colony'],
                'postal_code'       => $fields['postal_code'],
                'city'              => $fields['city'],
                'state'             => $fields['state'],
                'country'           => $fields['country'],
                'phone_number'      => $fields['phone_number'],
                'fax_number'        => $fields['fax_number'],
                'addressable_id'    => $administrator->id,
                'addressable_type'  => User::class,
            ]);

            return redirect()->route('administrator.show', compact('administrator'));

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }

    /**
     * Display the specified administrator.
     *
     * @param User $administrator
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(User $administrator)
    {
        try {
            // Owner user validation
            $this->authorize('showAdministrator', $administrator);

            return view('administrators.show', compact('administrator'));

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }

    /**
     * Show the form for editing the specified administrator.
     *
     * @param User $administrator
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(User $administrator)
    {
        try {
            // Owner user validation
            $this->authorize('editAndUpdateAdministrator', $administrator);

            return view('administrators.edit', compact('administrator'));

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }

    /**
     * Update the specified administrator in storage.
     *
     * @param User $administrator
     * @param UpdateAdministratorRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(User $administrator, UpdateAdministratorRequest $request)
    {
        try {
            // Owner user validation
            $this->authorize('editAndUpdateAdministrator', $administrator);

            // Fields validations
            $fields = $request->validated();

            // Update new user_info
            $administrator->userInfo->update([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'cell_phone_number' => $fields['cell_phone_number'],
            ]);

            // Update new address info
            $administrator->address->update([
                'street_address'    => $fields['street_address'],
                'outdoor_number'    => $fields['outdoor_number'],
                'interior_number'   => $fields['interior_number'],
                'colony'            => $fields['colony'],
                'postal_code'       => $fields['postal_code'],
                'city'              => $fields['city'],
                'state'             => $fields['state'],
                'country'           => $fields['country'],
                'phone_number'      => $fields['phone_number'],
                'fax_number'        => $fields['fax_number'],
            ]);

            return redirect()->route('administrator.show', [$administrator]);

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }

    /**
     * Remove the specified administrator from storage.
     *
     * @param User $administrator
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $administrator): RedirectResponse
    {
        try {
            // Owner user validation
            $this->authorize('deleteAdministrator', $administrator);

            $administrator->delete();

            return redirect()->route('userInfo.index');

        } catch (AuthorizationException $e) {

            return redirect()->route('userInfo.index');
        }
    }
}
