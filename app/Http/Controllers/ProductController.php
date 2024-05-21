<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $query = Product::with('category')->orderBy('name')->get();

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
                return '
                    <div class="btn-group">
                        <button class="btn bg-white text-info" onclick="editForm(`'.route('product.update', $query->id).'`)">
                        <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button class="btn bg-white text-danger" onclick="deleteData(`'.route('product.destroy', $query->id).'`)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                ';
            })
            ->rawColumns(['action', 'product_code', 'checkAll'])
            ->escapeColumns()
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name',
            'merk' => 'required',
            'purchase_price' => 'required',
            'discount' => 'required',
            'selling_price' => 'required',
            'supply' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // $product = Product::latest()->first() ?? new Product();
        // $request['product_code'] = 'P'. tambah_nol_kode((int)$product->id +1, 6);
        $product = Product::latest()->first() ?? new Product();
        $request['product_code'] = 'P'. tambah_nol_kode((int)$product->id +1, 6);
        $product = Product::create($request->all());
        return response()->json(['data' => $product, 'message' => 'Produk berhasil ditambakan']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product)
    {
        if (! $request->ajax()) {
            return view('product.show', compact('product'));
        }

        return response()->json(['data' => $product ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'merk' => 'required',
            'purchase_price' => 'required',
            'discount' => 'required',
            'selling_price' => 'required',
            'supply' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $product->update($data);

        return response()->json(['data' => $product, 'message' => 'Produk berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['data' => null, 'message' => 'Produk berhasil dihapus']);
    }

    // public function deleteSelected(Product $product)
    // {
    //     $product->delete();

    //     return response()->json(['data' => null, 'message' => 'Baris produk berhasil dihapus']);
    // }

    public function deleteSelected(Request $request, Product $product)
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

}
