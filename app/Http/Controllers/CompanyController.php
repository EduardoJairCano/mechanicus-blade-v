<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCompanyRequest;
use App\Models\Address;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Create a new company controller instance.
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new company.
     *
     * @param Customer|null $customer
     * @return Application|Factory|RedirectResponse|View
     */
    public function create(Customer $customer = null)
    {
        try {
            if ($customer) {
                // Validate for user logged to be owner of the customer
                $this->authorize('createCompany', $customer);
            }

            return view('companies.create', compact('customer'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Store a newly created company in storage.
     *
     * @param SaveCompanyRequest $request
     * @param Customer $customer
     * @return Application|Factory|RedirectResponse|View
     */
    public function store(SaveCompanyRequest $request, Customer $customer)
    {
        try {
            // Validate for user logged to be owner of the customer
            $this->authorize('createCompany', $customer);

            // Fields validations
            $fields = $request->validated();

            // Create new vehicle row
            $company = Company::create([
                'name'          => $fields['name'],
                'slug'          => 'slug-space',
                'customer_id'   => $customer->id,
            ]);

            // Slug creation
            $company->createSlug();

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
                'addressable_id'    => $company->id,
                'addressable_type'  => Company::class,
            ]);

            return view('companies.show', compact('company'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
    }

    /**
     * Display the specified company.
     *
     * @param Company $company
     * @return Application|Factory|RedirectResponse|View
     */
    public function show(Company $company)
    {
        try {
            // Validation for user logged and role type
            $this->authorize('showCompany', $company);

            return view('companies.show', compact('company'));

        } catch (AuthorizationException $e) {

            return redirect()->route('customer.index');
        }
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
     * @param Request $request
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
