<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $purchase_id = session('id');
        $product = Product::orderBy('name')->get();
        $supplier = Supplier::find(session('supplier_id'));
        // dd($product);
        if (! $supplier) {
            abort(404);
        }

        return view('purchase_detail.index', compact('purchase_id', 'product', 'supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function data($id)
    // {
    //     $detail = PurchaseDetail::with('product')
    //     ->where('purchase_id', $id)
    //     ->get();
    //     $data = array();
    //     $total = 0;
    //     $total_item = 0;

    //     foreach ($detail as $i) {
    //         $row = array();
    //         $row['product_code'] = '<span class="label label-success">'. $i->produk['product_code'] .'</span';
    //         $row['name'] = $i->produk['name'];
    //         $row['purchase_price']  = 'Rp. '. format_uang($i->purchase_price);
    //         $row['total']      = '<input type="number" class="form-control input-sm quantity" data-id="'. $i->id_pembelian_detail .'" value="'. $i->total .'">';
    //         $row['subtotal']    = 'Rp. '. format_uang($i->subtotal);
    //         $row['action']        = '<div class="btn-group">
    //                                 <button onclick="deleteData(`'. route('pembelian_detail.destroy', $i->id_pembelian_detail) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
    //                             </div>';
    //         $data[] = $row;

    //         $total += $i->purchase_price * $i->total;
    //         $total_item += $i->total;
    //     }

    //     $data[] = [
    //         'product_code' => '
    //             <div class="total hide">'. $total .'</div>
    //             <div class="total_item hide">'. $total_item .'</div>',
    //         'name' => '',
    //         'purchase_price'  => '',
    //         'total'      => '',
    //         'subtotal'    => '',
    //         'action'        => '',
    //     ];

    //     return datatables()
    //         // ->of($data)
    //         ->addIndexColumn()
    //         ->rawColumns(['action', 'product_code', 'total'])
    //         ->make(true);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $product = Product::orderBy('purchase_price')->get();
        dd($request->all());
        $product = Product::where('id', $request->id)
                            ->where('purchase_price', $request->purchase_price)                            
                            ->first();

        // dd($product);
        $validatedData = $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $purchaseDetail = new PurchaseDetail();
        $purchaseDetail->purchase_id = $validatedData['purchase_id'];
        $purchaseDetail->product_id = $validatedData['product_id'];
        $purchaseDetail->purchase_price = $product->purchase_price;
        $purchaseDetail->total = 1;
        $purchaseDetail->subtotal = $product->purchase_price;
        $purchaseDetail->save();

        // dd($purchaseDetail->subtotal);        
        return response()->json(['message' => 'Purchase detail saved successfully.'], 200);
        // return response()->json(['data' => $purchaseDetail, 'message' => 'Produk berhasil ditambahkan']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseDetail $purchaseDetail)
    {
        //
    }
}
