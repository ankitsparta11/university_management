<!-- resources/views/teachers/index.blade.php -->
@extends('layouts.app')

@section('title', 'Teachers')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Teachers</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add New Teacher</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="teachersTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
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
            $('#teachersTable').DataTable();
        });
    </script>
@endpush
