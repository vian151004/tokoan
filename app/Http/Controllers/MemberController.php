<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function data()
    {
        $query = Member::orderBy('member_code', 'desc')->get();

        return datatables($query)
        ->addIndexColumn()
        ->addColumn('checkAll', function ($query) {
            return '
                <input type="checkbox" name="member_id[]" value="'. $query->id .'">
            ';
        })
        ->addColumn('member_code', function ($query) {
            return '<span class="badge badge-success">'.($query->member_code) .'</span>';
        })
        ->addColumn('action', function ($query) {
            $action = '
                    <form action="'.route('member.destroy', $query->id).'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <a href="'.route('member.edit', $query->id).'" class="btn bg-white text-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <button class="btn bg-white text-danger" onclick="return confirm(\'Yakin ingin menghapus data?\')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';

                return $action;
        })
        ->rawColumns(['action', 'checkAll', 'member_code'])
        ->make(true);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:members,name',
            'address' => 'required',
            'phone' => 'required|string|min:11|max:17'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = Member::latest()->first() ?? new Member();
        $request['member_code'] = tambah_nol_kode((int)$data->id +1, 5);

        $data = $request->all();

        $member = Member::create($data);

        return response()->json([
            'data' => $member, 
            'message' => 'Anggota  berhasil ditambahkan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $query = Member::find($id);

        // return response()->json($query);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|string|min:11|max:17'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        $member->update($data);
        
        return redirect()
            ->route('member.index')
            ->with([
                'message' => 'Anggota berhasil diperbarui',
                'success' => true,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member) 
    {
        $member->delete();

        return back()
        ->with([
            'message' => 'Anggota berhasil dihapus',
            'success' => true,
        ]);
    }

    public function printCard(Request $request)
    {
        $memberIds = $request->input('member_id', []); // Default to empty array if not present

        $dataMember = collect([]);
        // $dataMember = Member::whereIn('id', $memberIds)->get();
        if (!empty($memberIds)) {                
            foreach ($memberIds as $id) {
                $member = Member::find($id);
                if ($member) {
                    $dataMember->push($member); // Add the member to the collection
                }
            }
        } else {
            return response()->json(['message' => 'Tidak ada Anggota terdaftar'], 400);
        }

        // return $dataMember->chunk(2);
        $dataMember = $dataMember->chunk(2);

        $no = 1;
        $pdf = PDF::loadView('member.membership', compact('dataMember', 'no'))->setPaper('a4', 'portrait');

        return $pdf->inline('member.pdf');
    }
}
