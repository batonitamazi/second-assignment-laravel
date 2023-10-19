@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <h1 class="text-center p-4 text-primary" >Here is the quizzes made by Me</h1>
    <div class="row">
        @foreach($quizzes as $quiz)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/' . $quiz['photo']) }}" class="card-img-top" style="height: 350px; background-size: contain;" alt="{{ $quiz['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $quiz['name'] }}</h5>
                    <p class="card-text">
                        Status:
                        <span class="badge {{ $quiz['status'] === 'active' ? 'badge-success' : 'badge-danger' }}">
                            {{ $quiz['status'] }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection