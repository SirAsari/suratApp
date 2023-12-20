<?php

namespace App\Http\Controllers;

use App\Models\letters;
use Illuminate\Http\Request;
use App\Models\letterTypes;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = $request->input('pagination', 5);
        $search = $request->input('search');

        $query = letters::query(); // Get a query builder instance

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        $letters = $pagination ? $query->paginate($pagination) : $query->get();

        return view('letter.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letterTypes = letterTypes::all(); 
        return view('letter.create', compact('letterTypes'));
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
    public function show(letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letters $letters)
    {
        //
    }

    public function countTotalLetters(letters $letters)
    {
    }
}
