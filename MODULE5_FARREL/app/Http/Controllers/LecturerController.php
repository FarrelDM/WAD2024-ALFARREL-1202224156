<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lecturers_code' => 'required|string|unique:lecturers,lecturers_code|max:3',
            'lecturers_name' => 'required|string',
            'nip' => 'required|string|unique:lecturers,nip',
            'email' => 'required|email|unique:lecturers,email',
            'telephone_number' => 'required|string',
        ]);

        Lecturer::create($validatedData);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lecturers = Lecturer::findOrFail($id);
        return view('lecturers.show', compact('lecturers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lecturers = Lecturer::findOrFail($id);
        return view('lecturers.edit', compact('lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lecturers = Lecturer::findOrFail($id);

        $validatedData = $request->validate([
            'lecturers_code' => 'required|string|max:3|unique:lecturers,lecturers_code,' . $lecturers->id,
            'lecturers_name' => 'required|string',
            'nip' => 'required|string|unique:lecturers,nip,' . $lecturers->id,
            'email' => 'required|email|unique:lecturers,email,' . $lecturers->id,
            'telephone_number' => 'required|string',
        ]);

        $lecturers->update($validatedData);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lecturers = Lecturer::findOrFail($id);
        $lecturers->delete();
        return redirect()->route('lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }
}
