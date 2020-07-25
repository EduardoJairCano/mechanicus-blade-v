<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Get all customers from DB
        $customers = Customer::get();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param SaveCustomerRequest $request
     * @return Application|Factory|View
     */
    public function store(SaveCustomerRequest $request)
    {
        // Fields validations
        $fields = $request->validated();

        // Slug creation
        // ToDo : improve the feature to do the slug with the ID's
        $slug = '123-' . trim($fields['first_name']) . '-' . trim($fields['last_name']);
        $slug = str_replace(' ', '-', $slug);

        Customer::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'rfc' => $fields['rfc'],
            'email' => $fields['email'],
            'cell_phone_number' => $fields['cell_phone_number'],
            'slug' => $slug,
            'user_id' => 1 // ToDo : Change for user_id in session
        ]);

        return view('customers.index');
    }

    /**
     * Display the specified customer.
     *
     * @param Customer $customer
     * @return Application|Factory|View
     */
    public function show(Customer $customer)
    {
        return \view('customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param Customer $customer
     * @return Application|Factory|View
     */
    public function edit(Customer $customer)
    {
        //
        return \view('customers.edit',[
            'customer' => $customer
        ]);
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
        // Fields validations
        $fields = $request->validated();

        // Slug creation
        // ToDo : improve the feature to do the slug with the ID's
        $slug = '123-' . trim($fields['first_name']) . '-' . trim($fields['last_name']);
        $slug = str_replace(' ', '-', $slug);

        $customer->update([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'rfc' => $fields['rfc'],
            'email' => $fields['email'],
            'cell_phone_number' => $fields['cell_phone_number'],
            'slug' => $slug,
        ]);

        return redirect()->route('customers.show', $customer);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
