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
        return view('lecturers.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturers.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $validatedData = $request->validate([
            'lecturers_code' => 'required|string|max:3|unique:lecturers,lecturers_code,' . $lecturer->id,
            'lecturers_name' => 'required|string',
            'nip' => 'required|string|unique:lecturers,nip,' . $lecturer->id,
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
            'telephone_number' => 'required|string',
        ]);

        $lecturer->update($validatedData);

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
