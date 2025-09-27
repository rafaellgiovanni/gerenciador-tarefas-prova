@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-3">{{ isset($task) ? 'Editar Tarefa' : 'Nova Tarefa' }}</h2>
        <form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
            @csrf
            @if(isset($task))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title ?? old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" class="form-control">{{ $task->description ?? old('description') }}</textarea>
            </div>
            @if(isset($task))
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="pendente" {{ $task->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="concluída" {{ $task->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                    <option value="em_andamento" {{ $task->status == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
                </select>
            </div>
            @endif

            <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Atualizar' : 'Salvar' }}</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
