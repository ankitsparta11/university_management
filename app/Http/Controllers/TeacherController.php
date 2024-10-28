<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{


    

    /**
     * Display a listing of all teachers.
     */
    public function index()
    {
        $teachers = Teacher::paginate(10); // Paginate teacher records
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created teacher in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    /**
     * Show the form for editing an existing teacher.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in the database.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Soft delete the specified teacher.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
