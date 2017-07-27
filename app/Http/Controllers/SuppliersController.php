<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create([

            'name' => request('name'),
            'address' => request('address'),
            'city' => request('city'),
            'state' => request('state'),
            'country' => request('country'),
            'zipcode' => request('zipcode'),
            'email' => request('email'),
            'phone' => request('phone'),
            'fax' => request('fax'),
            ]);

        return redirect('/suppliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        Supplier::find($supplier->id)->update([

            'name' => request('name'),
            'address' => request('address'),
            'city' => request('city'),
            'state' => request('state'),
            'country' => request('country'),
            'zipcode' => request('zipcode'),
            'email' => request('email'),
            'phone' => request('phone'),
            'fax' => request('fax'),
            ]);

        return redirect('/suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::find($supplier->id)->delete();
    }
}
