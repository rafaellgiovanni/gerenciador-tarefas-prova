<h1>Minhas Tarefas</h1>

<div style="margin-bottom: 15px;">
    <a href="{{ route('tasks.index') }}">Todas</a> |
    <a href="{{ route('tasks.index', ['status' => 'pendente']) }}">Pendentes</a> |
    <a href="{{ route('tasks.index', ['status' => 'concluida']) }}">Concluídas</a>
</div>


@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<ul>
@foreach($tasks as $task)
    <li>
        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            <input type="checkbox" onChange="this.form.submit()"
                   {{ $task->status === 'concluida' ? 'checked' : '' }}>
        </form>

        <strong class="{{ $task->status === 'concluida' ? 'text-decoration-line-through' : '' }}">
            {{ $task->title }}
        </strong>
        - {{ $task->description }}

        <span style="color: {{ $task->status === 'concluida' ? 'green' : 'orange' }}">
            [{{ ucfirst($task->status) }}]
        </span>

        <a href="{{ route('tasks.edit', $task->id) }}">Editar</a>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
        </form>
    </li>
@endforeach
</ul>
