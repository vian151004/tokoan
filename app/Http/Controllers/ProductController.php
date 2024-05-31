<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('name')->get()->pluck('name', 'id');

        return view('product.index', compact('category'));
    }

    public function data()
    {
        $query = Product::with('category')->orderBy('id', 'desc')->get();

        return datatables($query)
            ->addIndexColumn()
            ->addColumn('checkAll', function ($query) {
                return '
                    <input type="checkbox" name="product_id[]" value="'. $query->id .'">
                ';
            })
            ->addColumn('product_code', function ($query) {
                return '<span class="badge badge-success">'.($query->product_code) .'</span>';
            })
            ->addColumn('purchase_price', function ($query) {
                return format_uang($query->purchase_price);
            })
            ->addColumn('selling_price', function ($query) {
                return format_uang($query->selling_price);
            })
            ->addColumn('supply', function ($query) {
                return format_uang($query->supply);
            })
            ->addColumn('action', function ($query) {               
                $action = '
                    <form action="'.route('product.destroy', $query->id).'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <a href="'.route('product.edit', $query->id).'" class="btn bg-white text-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn bg-white text-danger" onclick="return confirm(\'Yakin ingin menghapus data?\')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';

                return $action;
            })
            ->rawColumns(['product_code', 'checkAll', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'merk' => 'required|unique:products,merk',
            'purchase_price' => 'required|regex:/^[0-9.]+$/',
            'discount' => 'required',
            'selling_price' => 'required|regex:/^[0-9.]+$/',
            'supply' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = Product::latest()->first() ?? new Product();
        $request['product_code'] = 'P'. tambah_nol_kode((int)$data->id +1, 6);
        
        $data = $request->all();
        $data['purchase_price'] = str_replace('.', '', $request->purchase_price);
        $data['selling_price'] = str_replace('.', '', $request->selling_price);
        $data['supply'] = str_replace('.', '', $request->supply);

        $product = Product::create($data);

        return response()->json(['data' => $product, 'message' => 'Produk berhasil ditambakan']);        
    }

    /**
     * Edit the specified resource.
     */
    public function edit(Product $product) 
    {
        $category = Category::orderBy('name')->get()->pluck('name', 'id');
        return view('product.edit', compact('product','category'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        // if (! $request->ajax()) {
        //     return view('product.show');
        // }

        // $product->purchase_price = format_uang($product->purchase_price);
        // $product->selling_price = format_uang($product->selling_price);
        // $product->supply = format_uang($product->supply);
        
        // return response()->json(['data' => $product ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'merk' => 'required',
            'purchase_price' => 'required|regex:/^[0-9.]+$/',
            'discount' => 'required',
            'selling_price' => 'required|regex:/^[0-9.]+$/',
            'supply' => 'required',
        ]);
                
        $data = $request->all();
        $data['purchase_price'] = str_replace('.', '', $request->purchase_price);
        $data['selling_price'] = str_replace('.', '', $request->selling_price);
        $data['supply'] = str_replace('.', '', $request->supply);
        
        $product->update($data);

        return redirect()->route('product.index')
            ->with([
                'message' => 'Produk berhasil diperbarui',
                'success' => true,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
        ->with([
            'message' => 'Produk berhasil dihapus',
            'success' => true,
        ]);
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('product_id');
        if (is_array($ids)) {
            Product::whereIn('id', $ids)->delete();
            return response()->json([
                'data' => null,
                'message' => 'Baris produk berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'data' => null,
                'message' => 'Tidak ada produk yang dipilih untuk dihapus'
            ], 400);
        }
    }

    public function printBarcode(Request $request)
    {
        $productIds = $request->input('product_id', []); // Default to empty array if not present

        $dataProduct = [];

        if (!empty($productIds)) {                
            foreach ($productIds as $id) {
                $product = Product::find($id);
                if ($product) {
                    $dataProduct[] = $product; // Add the product to the array
                }
            }
        } else {
            return response()->json(['message' => 'Tidak ada produk tersedia'], 400);
        }

        $no = 1;
        $pdf = PDF::loadView('product.barcode', compact('dataProduct', 'no'));        
        return $pdf->stream('product.pdf');

    }

}
