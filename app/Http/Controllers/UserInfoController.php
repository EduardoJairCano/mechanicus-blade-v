<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserInfoRequest;
use App\Models\Address;
use App\Models\UserInfo;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $user = Auth::user();

        return view('userInfo.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $user = Auth::user();
        //
        return view('userInfo.create', [
            'user' => $user,
            'userInfo' => new UserInfo(),
        ]);
    }

    /**
     * Store a newly created user_info in storage.
     *
     * @param SaveUserInfoRequest $request
     * @return Application|Factory|View
     */
    public function store(SaveUserInfoRequest $request)
    {
        $user = Auth::user();

        if ($user) {
            // Fields validations
            $fields = $request->validated();

            // Create new user_info row
            UserInfo::create([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'cell_phone_number' => $fields['cell_phone_number'],
                'role'              => 1,
                'user_id'           => $user->id,
            ]);

            // Create new address row
            Address::create([
                'street_address'    => $fields['street_address'],
                'outdoor_number'    => $fields['outdoor_number'],
                'interior_number'   => $fields['interior_number'],
                'colony'            => $fields['colony'],
                'postal_code'       => $fields['postal_code'],
                'city'              => $fields['municipality'],
                'municipality'      => $fields['municipality'],
                'state'             => $fields['state'],
                'country'           => $fields['country'],
                'phone_number'      => $fields['phone_number'],
                'fax_number'        => $fields['fax_number'],
                'addressable_id'    => $user->id,
                'addressable_type'  => User::class,
            ]);
        }

        // ToDo: Successfully message

        return view('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user info.
     *
     * @param  User  $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        //
        return view('userInfo.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified user info in storage.
     *
     * @param User $user
     * @param SaveUserInfoRequest $request
     * @return RedirectResponse
     */
    public function update(User $user, SaveUserInfoRequest $request): RedirectResponse
    {
        // Fields validations
        $fields = $request->validated();

        // Update new user_info
        $user->userInfo->update([
            'first_name'        => $fields['first_name'],
            'last_name'         => $fields['last_name'],
            'rfc'               => $fields['rfc'],
            'cell_phone_number' => $fields['cell_phone_number'],
        ]);

        // Update new address info
        $user->address->update([
            'street_address'    => $fields['street_address'],
            'outdoor_number'    => $fields['outdoor_number'],
            'interior_number'   => $fields['interior_number'],
            'colony'            => $fields['colony'],
            'postal_code'       => $fields['postal_code'],
            'city'              => $fields['municipality'],
            'municipality'      => $fields['municipality'],
            'state'             => $fields['state'],
            'country'           => $fields['country'],
            'phone_number'      => $fields['phone_number'],
            'fax_number'        => $fields['fax_number'],
        ]);

        return redirect()->route('userInfo.index');
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
