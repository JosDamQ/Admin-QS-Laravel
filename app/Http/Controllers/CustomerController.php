<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index', [
            'customers' => Customer::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $data = request()->only('name', 'surname', 'email', 'phone', 'password');
        //insert into DB
        Customer::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'code' => fake()->unique()->bothify('???###'), // 'ABC123
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
        ]);
        session()->flash('statusKey', 'Customer was created!');
        return to_route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required'
        ]);

        $data = request()->only('name', 'surname', 'phone');
        //insert into DB
        $customer->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            //'code' => fake()->unique()->bothify('???###'), // 'ABC123
            //'email' => $data['email'],
            'phone' => $data['phone'],
            //'password' => $data['password'],
        ]);
        session()->flash('statusKey', 'Customer was updated!');
        return to_route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        session()->flash('statusKey', 'Customer was deleted!');
        return to_route('customers.index');
    }
}
