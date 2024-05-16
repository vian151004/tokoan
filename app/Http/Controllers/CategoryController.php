<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('name')->get();

        return view('category.index', compact('category'));
    }

    public function data()
    {
        $query = Category::orderBy('id', 'desc')->get();

        return datatables($query)
        ->addIndexColumn()
        ->editColumn('name', function ($query) {
            return $query->name;
        })
        ->addColumn('action', function ($query) {
            return '
                <div class="btn-group">
                    <button class="btn bg-white text-info" onclick="editForm(`'.route('category.update', $query->id).'`)">
                    <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button class="btn bg-white text-danger" onclick="deleteData(`'.route('category.destroy', $query->id).'`)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            ';
        })
        ->rawColumns(['action'])
        ->escapeColumns()
        ->make(true);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only('name');
        // dd($data);

        $category = Category::create($data);

        return response()->json(['data' => $category, 'message' => 'Kategori  berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $query = Category::find($id);

        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only('name');

        $category->update($data);

        return response()->json(['data' => $category, 'message' => 'Kategori berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['data' => null, 'message' => 'Kategori berhasil dihapus']);
    }
}
