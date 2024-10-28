<!-- resources/views/teachers/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Teacher')

@section('content')
    <h2>Edit Teacher</h2>

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Teacher Name</label>
            <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $teacher->phone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Teacher</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
