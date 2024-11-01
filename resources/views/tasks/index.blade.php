@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                <h2>Vazifalar ro'yxati</h2>
            </div>
            <div class="col">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Vazifa yaratish</a>
            </div>
        </div>

        <!-- Xabarlar bo'limi -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-3">
            <form method="GET" action="{{ route('tasks.index') }}">
                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="status">Holat:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">Hammasi</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Tugallangan</option>
                            <option value="incomplete" {{ request('status') == 'incomplete' ? 'selected' : '' }}>Tugallanmagan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <label for="search">Qidirish:</label>
                    </div>
                    <div class="col-md-10 mt-3">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Vazifa nomi bo'yicha qidirish">
                    <button type="submit" class="btn mt-2 btn-success">Qidirish</button>
                    </div>
                </div>

            </form>
        </div>

        <table class="table mt-3">
            <thead>
            <tr>
                <th>Nomi</th>
                <th>Holati</th>
                <th>Tavsifi</th>
                <th>Amallar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->completed ? 'Tugallangan' : 'Tugallanmagan' }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Tahrirlash</a>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('tasks.toggleStatus', $task->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info">{{ $task->completed ? 'Qayta ochish' : 'Tugallash' }}</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">O'chirish</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
