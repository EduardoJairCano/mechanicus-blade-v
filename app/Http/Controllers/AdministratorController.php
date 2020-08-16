<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Address;
use App\Models\Pivots\AssignedOwner;
use App\Models\UserInfo;
use App\User;
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
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('administrators.create', [
            'administrator' => new User,
        ]);
    }

    /**
     * Store a newly created administrator in storage.
     *
     * @param SaveAdministratorRequest $request
     * @return Application|Factory|View
     */
    public function store(SaveAdministratorRequest $request)
    {
        $user = Auth::user();

        if ($user) {
            // Fields validations
            $fields = $request->validated();

            // Create new user row
            $admin = new User;
            $admin->email       = $fields['email'];
            $admin->password    = Hash::make('admin1234');
            $admin->role_id     = 4;
            $admin->save();

            // Create new owner-user row
            AssignedOwner::create([
               'owner_id'           => $user->id,
               'user_id'            => $admin->id,
            ]);

            // Create new user_info row
            UserInfo::create([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'cell_phone_number' => $fields['cell_phone_number'],
                'user_id'           => $admin->id,
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
                'addressable_id'    => $admin->id,
                'addressable_type'  => User::class,
            ]);
        }

        return view('userInfo.index');
    }

    /**
     * Display the specified administrator.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('administrators.show', [
            'administrator' => $user
        ]);
    }

    /**
     * Show the form for editing the specified administrator.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('administrators.edit', [
            'administrator' => $user
        ]);
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
        // Fields validations
        $fields = $request->validated();

        $user = Auth::user();

        if ($user) {
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
        }

        return redirect(route('administrator.show', $administrator));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
