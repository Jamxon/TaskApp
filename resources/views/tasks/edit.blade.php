@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vazifani Tahrirlash</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Sarlavha</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="completed" class="form-check-input" id="completed" {{ $task->completed ? 'checked' : '' }}>
                <label class="form-check-label" for="completed">Bajarilgan deb belgilash</label>
            </div>
            <button type="submit" class="btn btn-primary">Yangilash</button>
        </form>
    </div>
@endsection
