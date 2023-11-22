@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center p-4 text-primary">
            {{ $quiz->exists ? 'Edit Quiz' : 'Add New Quiz' }}
        </h1>

        <form action="{{ $quiz->exists ? route('quizzes.update', ['quiz' => $quiz->id]) : route('quizzes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($quiz->exists)
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $quiz->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $quiz->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <div class="form-check">
                    <input type="checkbox" name="status" id="status" class="form-check-input" {{ $quiz->status ? 'checked' : '' }}>
                    <label for="status" class="form-check-label">Active</label>
                </div>
            </div>

            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="number" name="grade" id="grade" class="form-control" value="{{ old('grade', $quiz->grade) }}" min="0" max="100" required>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">
                {{ $quiz->exists ? 'Update Quiz' : 'Add Quiz' }}
            </button>
        </form>
    </div>
@endsection
