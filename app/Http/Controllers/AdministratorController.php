<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAdministratorRequest;
use App\Models\Address;
use App\Models\Pivots\AssignedOwner;
use App\Models\UserInfo;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
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
            'admin' => new User,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
