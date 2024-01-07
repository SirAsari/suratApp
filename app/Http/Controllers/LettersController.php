<?php

namespace App\Http\Controllers;

use App\Exports\lettersExport;
use App\Models\letters;
use Illuminate\Http\Request;
use App\Models\letterTypes;
use App\Models\User;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = $request->input('pagination', 5);
        $search = $request->input('search');

        $query = letters::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('letter_perihal', 'LIKE', '%' . $search . '%')
                    ->orWhere('content', 'LIKE', '%' . $search . '%');
            });
        }

        $letters = $pagination ? $query->paginate($pagination) : $query->get();

        // Format nama
        $letters->each(function ($letter) {
            $recipientIds = json_decode($letter->recipients, true);
            $recipients = User::whereIn('id', $recipientIds)->pluck('name')->implode(', ');
            $letter->formatted_recipients = $recipients;
        });

        return view('letter.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = User::where('role', 'guru')->orderBy('name', 'ASC')->get();
        $allUsers = User::all();
        $letterTypes = letterTypes::all();

        return view('letter.create', compact('gurus', 'allUsers', 'letterTypes'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'letter_perihal' => 'required',
            'letter_type_id' => 'required|exists:letter_types,id',
            'content' => 'required',
            'notulis_id' => 'required|exists:users,id'
        ]);

        $letter = new letters();
        $letter->letter_type_id = $validatedData['letter_type_id'];
        $letter->letter_perihal = $validatedData['letter_perihal'];
        $letter->content = $validatedData['content'];
        $letter->attachment = $request->hasFile('lampiran') ? $request->file('lampiran')->store('lampiran') : null;
        $letter->notulis_id = $validatedData['notulis_id'];

        // Handle recipients - Assuming 'recipients' is an array of user IDs from the form
        if ($request->has('recipients')) {
            $recipients = $request->input('recipients');
            $letter->recipients = json_encode($recipients); // Convert to JSON and store in 'recipients' field
        }

        $letter->save();

        return view('letter.details', compact('letter'));
    }




    /**
     * Display the specified resource.
     */
    public function show(letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gurus = User::where('role', 'guru')->orderBy('name', 'ASC')->get();
        $allUsers = User::all();
        $letterTypes = letterTypes::all();

        return view('letter.create', compact('gurus', 'allUsers', 'letterTypes'));
    }

    public function update(Request $request, letters $letter)
    {
        $validatedData = $request->validate([
            'letter_perihal' => 'required',
            'letter_type_id' => 'required|exists:letter_types,id',
            'content' => 'required',
            'notulis_id' => 'required|exists:users,id'
            // Add validation for recipients if necessary
        ]);

        $letter->letter_type_id = $validatedData['letter_type_id'];
        $letter->letter_perihal = $validatedData['letter_perihal'];
        $letter->content = $validatedData['content'];
        $letter->attachment = $request->hasFile('lampiran') ? $request->file('lampiran')->store('lampiran') : null;
        $letter->notulis_id = $validatedData['notulis_id'];

        // Handle recipients - Assuming 'recipients' is an array of user IDs from the form
        if ($request->has('recipients')) {
            $recipients = $request->input('recipients');
            $letter->recipients = json_encode($recipients); // Convert to JSON and store in 'recipients' field
        }

        $letter->save();

        return redirect()->route('letter.index')->with('success', 'Surat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        letters::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Data berhasil dihapus');
    }

    public function generatePDF($id)
    {
        $letter = letters::find($id); // Fetch a single letter by its ID

        if (!$letter) {
            return redirect()->back()->with('error', 'No letter found with this ID.');
        }

        $pdf = PDF::loadView('pdf_view', compact('letter'));

        return $pdf->download($letter->letter_perihal . '.pdf');
    }

    public function details($id)
    {
        
    }
    public function exportExcel()
    {
        $file_name = 'surat.xlsx';
        $response = Excel::download(new lettersExport, $file_name);
        ob_end_clean();

        return $response;
    }
}
