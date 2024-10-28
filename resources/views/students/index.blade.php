<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="studentsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Class Teacher</th>
                <th>Admission Date</th>
                <th>Yearly Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->teacher->name ?? 'N/A' }}</td>
                    <td>{{ $student->admission_date }}</td>
                    <td>{{ $student->yearly_fees }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable();
        });
    </script>
@endpush
