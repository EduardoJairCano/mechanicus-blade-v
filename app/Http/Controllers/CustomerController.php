<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
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
     * @return Application|Factory|View
     */
    public function store()
    {
        $firstName = \request('first_name');
        $lastName = \request('last_name');
        $rfc = \request('rfc');
        $email = \request('email');
        $cellPhoneNumber = \request('cell_phone_number');
        $slug = '134' . trim($firstName) . '-' . trim($lastName);

        Customer::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'rfc' => $rfc,
            'email' => $email,
            'cell_phone_number' => $cellPhoneNumber,
            'slug' => $slug,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified customer in storage.
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
