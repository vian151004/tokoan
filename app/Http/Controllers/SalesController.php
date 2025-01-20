<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $supplier = Supplier::orderBy('name')->get();

        // return view('purchase.index', compact('supplier'));
        // return view('sales.index');
    }

    
    /**
     * Create 
     */
    public function create($id)
    {
        $sales = New Sales();
        $sales->member_id = $id;
        $sales->total_item = 0;
        $sales->total_price = 0;
        $sales->discount = 0;
        $sales->pay = 0;
        $sales->accepted = 0;
        $sales->user_id = auth()->id();
        $sales->save();

        session(['member_id' => $member->member_id]);
        return redirect()->route('sales.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
