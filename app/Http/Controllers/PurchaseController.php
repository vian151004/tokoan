<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::orderBy('name')->get();

        return view('purchase.index', compact('supplier'));
    }

    public function data()
    {
        $query = Purchase::with('supplier')->orderBy('id', 'desc');

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('total_item', function ($query) {
                return format_uang($query->total_item);
            })
            ->addColumn('total_price', function ($query) {
                return 'Rp. '. format_uang($query->total_price);
            })
            ->addColumn('discount', function ($query) {
                return $query->discount . '%';
            })
            ->addColumn('pay', function ($query) {
                return 'Rp. '. format_uang($query->pay);
            })
            ->addColumn('supplier', function ($query) {
                return $query->supplier->name;
            })
            ->addColumn('created_at', function ($query) {
                return tanggal_indonesia($query->created_at, false);
            })
            ->addColumn('action', function ($query) {               
                $action = '
                    <div class="btn-group">
                        <button onclick="showDetail(`'. route('pembelian.show', $query->id) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-eye"></i></button>
                        <button onclick="deleteData(`'. route('pembelian.destroy', $query->id) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                ';

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create($id)
    {
        $purchase = new Purchase();
        $purchase->supplier_id = $id;
        $purchase->total_item = 0;
        $purchase->total_price = 0;
        $purchase->discount = 0;
        $purchase->pay = 0;        
        $purchase->save();

        session(['id'=> $purchase->id]);
        session(['supplier_id'=> $purchase->supplier_id]);

        return redirect()->route('purchase_detail.index');
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
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
