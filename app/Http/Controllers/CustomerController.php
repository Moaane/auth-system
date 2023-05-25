<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::latest()->paginate(5);

        
        return view('customer_list', compact('customer'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
        ]);

        if($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Successfully insert new customerz');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::where('id',$id)->firstOrFail();

        return view('customer_edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
        ]);

        if($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        $customer = Customer::where('id',$id)->firstOrFail();
        
        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Successfully update customer data');        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::where('id',$id)->firstOrFail();

        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Successfully delete customer data');        
    }
}
