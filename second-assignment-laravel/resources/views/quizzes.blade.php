@extends('layouts.app')


@section('content')
<div class="container">
    <h1 class="text-center p-4 text-primary" >Here is the quizzes made by Me</h1>
    <a href="{{ route('quizzes.create') }}" class="btn btn-primary">Add New Quiz</a>
    <div class="row">
        @foreach($quizzes as $quiz)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/images/'.$quiz->image_path) }}" class="card-img-top" style="height: 350px; background-size: contain;" alt="{{ $quiz->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz['name'] }}</h5>
                        <h5 class="card-title">{{ $quiz['description'] }}</h5>
                        <h5 class="card-title">{{ $quiz['grade'] }}</h5>
                        <p class="card-text">
                            Status:
                            <span class="badge {{ $quiz['status'] === 'active' ? 'badge-success' : 'badge-danger' }}">
                                {{ $quiz['status'] }}
                            </span>
                        </p>
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-info">Edit Quiz</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
