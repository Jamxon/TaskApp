@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Yangi Vazifa Yaratish</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Sarlavha</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>
@endsection
