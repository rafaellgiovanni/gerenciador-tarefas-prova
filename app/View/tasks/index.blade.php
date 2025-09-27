@extends('layouts.app')

@section('content')
<h1>Minhas Tarefas</h1>

<a href="{{ route('tasks.create') }}">Nova Tarefa</a>

<form method="GET" action="{{ route('tasks.index') }}">
    <select name="status" onchange="this.form.submit()">
        <option value="">Todas</option>
        <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendentes</option>
        <option value="concluída" {{ request('status') == 'concluída' ? 'selected' : '' }}>Concluídas</option>
    </select>
</form>

<ul>
    @foreach($tasks as $task)
        <li>
            {{ $task->title }} - {{ $task->status }}
            <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button>Excluir</button>
            </form>
            @if($task->status == 'pendente')
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="concluída">
                    <button>Marcar como Concluída</button>
                </form>
            @endif
        </li>
    @endforeach
</ul>
@endsection
