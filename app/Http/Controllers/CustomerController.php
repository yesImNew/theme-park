<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nid' => 'required|alpha_num|max:10|unique:customers',
            'name' => 'required|max:30',
            'phone_no' => 'required|unique:customers|numeric|starts_with:9,7|digits:7',
        ]);

        Customer::create($data);

        return redirect()->route('customers.index')
        ->with('success', ['Created', 'New customer added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // Validate
        $data = $request->validate([
            'nid' => ['required', 'alpha_num', 'max:10',
                Rule::unique('customers')->ignore($customer->id)],
            'name' => 'required|max:30',
            'phone_no' => ['required', 'numeric', 'starts_with:9,7', 'digits:7',
                Rule::unique('customers')->ignore($customer->id)],
        ]);

        $customer->update($data);

        return redirect()->route('customers.show', $customer)
            ->with('success', ['Updated', 'Customer information updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('danger', ['Deleted' , 'Customer deleted']);
    }
}
