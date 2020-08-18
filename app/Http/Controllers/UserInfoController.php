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
     * Create a new userInfo controller instance.
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
     * Display a listing of the userInfo.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $user = Auth::user();
        $subUsers = [];

        // Get the administrators(sub-users), only if the current user is owner
        if ($user->hasRole(['owner'])) {
            $subUsers = $user->subUsers;
        }

        return view('userInfo.index', compact(['user', 'subUsers']));
    }

    /**
     * Show the form for creating a new userInfo.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function create()
    {
        $user = Auth::user();
        $userInfo = new UserInfo();

        if (is_null($user->userInfo)) {
            return view('userInfo.create', compact(['user', 'userInfo']));
        }

        return redirect()->route('userInfo.index');
    }

    /**
     * Store a newly created userInfo in storage.
     *
     * @param SaveUserInfoRequest $request
     * @return RedirectResponse
     */
    public function store(SaveUserInfoRequest $request): RedirectResponse
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
                'user_id'           => $user->id,
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
                'addressable_id'    => $user->id,
                'addressable_type'  => User::class,
            ]);
        }

        // ToDo: Successfully message

        return redirect()->route('userInfo.index');

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
     * Show the form for editing the specified userInfo.
     *
     * @param  User  $user
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(User $user)
    {
        if (auth()->user()->id === $user->id) {
            return view('userInfo.edit', compact('user'));
        }

        return redirect()->route('userInfo.index');
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
            'city'              => $fields['city'],
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
