<!-- resources/views/teachers/create.blade.php -->
@extends('layouts.app')

@section('title', 'Add New Teacher')

@section('content')
    <h2>Add New Teacher</h2>

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Teacher Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
