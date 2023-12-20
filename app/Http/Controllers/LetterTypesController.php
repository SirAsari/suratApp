<?php

namespace App\Http\Controllers;

use App\Exports\letterTypesExport;
use App\Models\letterTypes;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class LetterTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index(Request $request)
    {
        $pagination = $request->input('pagination', 5);
        $search = $request->input('search');

        $query = letterTypes::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        $letterTypes = $pagination ? $query->paginate($pagination) : $query->get();

        return view('letterTypes.index', compact('letterTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('letterTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_type' => 'required|unique:letter_types',
            'letter_code' => 'required|unique:letter_types',
        ],
        [
            'name_type.required' => 'Klasifikasi Surat Harus Diisi',
            'letter_Code.required' => 'Kode Klasifikasi Surat Harus Diisi',
            'letter_Code.unique' => 'Kode Klasifikasi Surat Sudah Ada',
            'name_type.unique' => 'Nama Klasifikasi Surat Sudah Ada',
        ]
        );

        $totalLetterTypes = LetterTypes::count();
        $incrementalNumber = $totalLetterTypes + 1;

        $letterType = LetterTypes::create([
            'letter_code' => $request->input('letter_code') . '-' . $incrementalNumber,
            'name_type' => $request->input('name_type'),
        ]);

        if ($letterType) {
            return redirect()->route('letterType.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('failed', 'Data gagal ditambahkan');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(letterTypes $letterTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $letterTypes = letterTypes::find($id);

        return view('letterTypes.edit', compact('letterTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name_type' => 'required|unique:letter_types,name_type,'.$id,
        'letter_code' => 'required|unique:letter_types,letter_code,'.$id,
    ], [
        'name_type.required' => 'Klasifikasi Surat Harus Diisi',
        'letter_code.required' => 'Kode Klasifikasi Surat Harus Diisi',
        'letter_code.unique' => 'Kode Klasifikasi Surat Sudah Ada',
        'name_type.unique' => 'Nama Klasifikasi Surat Sudah Ada',
    ]);

    $letterType = letterTypes::find($id);

    $letterType->name_type = $request->input('name_type');

    // Retrieve the complete letter_code (including characters after the hyphen) from the hidden field
    $completeLetterCode = $request->input('full_letter_code');

    // Combine the visible part and the complete letter_code to form the updated letter_code
    $updatedLetterCode = $request->input('letter_code') . '-' . explode('-', $completeLetterCode)[1];

    $letterType->letter_code = $updatedLetterCode;

    $letterType->save();

    return redirect()->route('letterType.index')->with('success', 'Data berhasil diubah');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letterTypes $letterTypes)
    {
        //
    }
    public function exportExcel()
    {
        $file_name = 'klasifikasi_surat.xlsx';
        $response = Excel::download(new letterTypesExport, $file_name);
        ob_end_clean();

        return $response;
    }
}
