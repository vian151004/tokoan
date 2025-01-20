<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\SalesDetail;
use App\Models\Setting;
use Illuminate\Http\Request;

class SalesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('name', 'asc')->get();
        $member = Member::orderBy('name')->get();
        $setting = Setting::first();

        // dd($product, $member, $setting);

        if ($id = session('id')) {
            return view('sales_detail.index', compact('product', 'member', 'setting'));
        } else {
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('sales');
            } else { 
                return redirect()->route('home');
            }
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesDetail $salesDetail)
    {
        //
    }
}
