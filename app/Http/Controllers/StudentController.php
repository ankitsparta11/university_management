<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::with('teacher')->paginate(10); // Fetch students with their teacher info
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $teachers = Teacher::all(); // Get all teachers for the dropdown
        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing an existing student.
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all(); // Get all teachers for the dropdown
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Soft delete the specified student.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
