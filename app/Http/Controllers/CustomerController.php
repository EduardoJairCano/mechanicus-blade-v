<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Http\Requests\SaveCustomerRequest;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
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
     * Display a listing of the customers.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = auth()->user();

        // Get all customers for owner user
        if ($user->hasRole(['owner'])) {
            $customers = $user->customers ?? null;
        } elseif ($user->hasRole(['admin'])) {
            $customers = $user->owner[0]->customers ?? null;
        }

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $customer = new Customer();

        return view('customers.create', compact('customer'));
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param SaveCustomerRequest $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function store(SaveCustomerRequest $request)
    {
        // Fields validations
        $fields = $request->validated();

        // Validation for existing user and role type to get the owner id
        $user = Auth::user();
        $ownerId = $user->getOwnerId();

        if (isset($ownerId)) {
            // Create new customer row
            $customer = Customer::create([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'email'             => $fields['email'],
                'cell_phone_number' => $fields['cell_phone_number'],
                'slug'              => '',
                'user_id'           => $ownerId,
            ]);

            // Slug creation
            $customer->createSlug();

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
                'addressable_id'    => $customer->id,
                'addressable_type'  => Customer::class,
            ]);

            return view('customers.show', ['customer' => $customer]);
        }

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified customer.
     *
     * @param Customer $customer
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(Customer $customer)
    {
        try {
            // Validation for user logged and role type
            $this->authorize('showCustomer', $customer);

            return view('customers.show', compact('customer'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param Customer $customer
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit(Customer $customer)
    {
        try {
            // Validation for user logged and role type
            $this->authorize('editAndUpdateCustomer', $customer);

            return view('customers.edit', compact('customer'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Update the specified customer in storage.
     *
     * @param Customer $customer
     * @param SaveCustomerRequest $request
     * @return RedirectResponse
     */
    public function update(Customer $customer, SaveCustomerRequest $request): RedirectResponse
    {
        try {
            // Validation for user logged and role type
            $this->authorize('editAndUpdateCustomer', $customer);

            // Fields validations
            $fields = $request->validated();

            // Update customer info
            $customer->update([
                'first_name'        => $fields['first_name'],
                'last_name'         => $fields['last_name'],
                'rfc'               => $fields['rfc'],
                'email'             => $fields['email'],
                'cell_phone_number' => $fields['cell_phone_number'],
                'slug'              => '',
            ]);

            // Update Slug
            $customer->createSlug();

            // Update new address info
            $customer->address->update([
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

            return redirect()->route('customer.show', $customer);

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param Customer $customer
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        try {
            // Owner user validation
            $this->authorize('deleteCustomer', $customer);

            $customer->delete();

            return redirect()->route('customer.index');

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }
}
