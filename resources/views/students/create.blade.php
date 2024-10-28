<!-- resources/views/students/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
    <h2>Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Class</label>
            <input type="text" name="class" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="class_teacher_id" class="form-label">Class Teacher</label>
            <select name="class_teacher_id" class="form-select" required>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="admission_date" class="form-label">Admission Date</label>
            <input type="date" name="admission_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="yearly_fees" class="form-label">Yearly Fees</label>
            <input type="number" name="yearly_fees" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
