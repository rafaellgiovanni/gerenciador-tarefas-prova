@extends('layouts.app')

@section('content')
<h1>Editar Tarefa</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" class="form-control" required maxlength="255">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>


    <button class="btn btn-primary" type="submit">Atualizar</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
