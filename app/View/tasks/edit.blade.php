@extends('layouts.app')

@section('content')
<h1>Editar Tarefa</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Título:</label>
    <input type="text" name="title" value="{{ $task->title }}" required maxlength="255">
    
    <label>Descrição:</label>
    <textarea name="description" required>{{ $task->description }}</textarea>
    
    <label>Status:</label>
    <select name="status">
        <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
        <option value="concluída" {{ $task->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
    </select>
    
    <button type="submit">Atualizar</button>
</form>
@endsection
