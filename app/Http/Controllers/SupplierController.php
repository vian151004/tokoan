<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.index');
    }


    public function data() 
    {
        $query = Supplier::orderBy('id', 'desc')->get();

        return datatables($query)
        ->addIndexColumn()
        ->addColumn('action', function ($query) {
            $action = '
                <div class="btn-group">
                    <button class="btn bg-white text-info" onclick="editForm(`'.route('supplier.update', $query->id).'`)">
                    <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button class="btn bg-white text-danger" onclick="deleteData(`'.route('supplier.destroy', $query->id).'`)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            ';

            return $action;
        })
        ->rawColumns(['action'])
        ->make(true);    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:suppliers,name',
            'address' => 'required',
            'phone' => 'required|string|min:11|max:17'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        // dd($data);

        $supplier = Supplier::create($data);

        return response()->json(['data' => $supplier, 'message' => 'Penyuplai  berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $query = Supplier::find($id);

        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|string|min:11|max:17'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        // dd($data);

        $supplier->update($data);

        return response()->json(['data' => $supplier, 'message' => 'Penyuplai  berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(['data' => null, 'message' => 'Penyuplai berhasil dihapus']);
    }
}
