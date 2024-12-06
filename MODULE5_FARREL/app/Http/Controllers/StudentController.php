<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('lecturers')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Lecturer::all();
        return view('students.create', compact('lecturers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|unique:students,nim',
            'student_name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'major' => 'required|string',
            'lecturer_id' => 'required|exists:lecturers,id',
        ]);

    // Explicitly add lecturer_id to the create method
        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        $lecturers = Lecturer::all();
        return view('students.edit', compact('students', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|unique:students,nim,' . $id,
            'student_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'major' => 'required',
            'lecturer_id' => 'required|exists:lecturers,id',
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
