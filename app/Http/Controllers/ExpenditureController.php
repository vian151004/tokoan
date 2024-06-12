<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('expenditure.index');
    }


    public function data() 
    {
        $query = Expenditure::orderBy('id', 'desc')->get();

        return datatables($query)
        ->addIndexColumn()
        ->addColumn('nominal', function ($query) {
            return format_uang($query->nominal);
        })
        ->addColumn('created_at', function ($query) {
            return tanggal_indonesia($query->created_at);
        })
        ->addColumn('action', function ($query) {
            $action = '
                <div class="btn-group">
                    <button class="btn bg-white text-info" onclick="editForm(`'.route('expenditure.update', $query->id).'`)">
                    <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button class="btn bg-white text-danger" onclick="deleteData(`'.route('expenditure.destroy', $query->id).'`)">
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
            'description' => 'required',
            'nominal' => 'required',            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['nominal'] = str_replace('.', '', $request->nominal);

        $expenditure = Expenditure::create($data);

        return response()->json(['data' => $expenditure, 'message' => 'Pengeluaran berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $query = Expenditure::find($id);

        return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'nominal' => 'required',            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['nominal'] = str_replace('.', '', $request->nominal);

        $expenditure->update($data);

        return response()->json(['data' => $expenditure, 'message' => 'Pengeluaran berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();

        return response()->json(['data' => null, 'message' => 'Pengeluaran berhasil dihapus']);
    }
}
