@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Minhas Tarefas</h1>

    {{-- Ações e filtros --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 p-3 rounded shadow-sm" style="gap: 1rem; background-color: #ffffff;">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary px-4 py-2 mb-2">Nova Tarefa</a>
        <div class="d-flex flex-wrap gap-2 mb-2">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Todas</a>
            <a href="{{ route('tasks.index', ['status' => 'pendente']) }}" class="btn btn-warning">Pendentes</a>
            <a href="{{ route('tasks.index', ['status' => 'concluída']) }}" class="btn btn-success">Concluídas</a>
        </div>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success flash-message">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger flash-message">{{ session('error') }}</div>
    @endif

    {{-- Lista de tarefas --}}
    @if($tasks->isEmpty())
        <p class="text-muted text-center">Nenhuma tarefa encontrada.</p>
    @else
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-start mb-3 p-3 rounded shadow-sm" style="gap:1rem;">

                    {{-- Info da tarefa --}}
                    <div class="task-info flex-grow-1 min-width-0">
                        {{-- Título --}}
                        <strong class="fs-6 task-title mb-1" id="title-{{ $task->id }}" data-full="{{ $task->title }}">
                            {{ $task->title }}
                        </strong>
                        <button class="btn btn-link btn-sm p-0 mb-2 d-none" onclick="toggleTitle({{ $task->id }})" id="title-btn-{{ $task->id }}">Ver mais</button>

                        {{-- Descrição --}}
                        <p class="mb-1 task-desc text-secondary" id="desc-{{ $task->id }}" data-full="{{ $task->description }}">
                            {{ $task->description }}
                        </p>
                        <button class="btn btn-link btn-sm p-0 d-none" onclick="toggleDesc({{ $task->id }})" id="desc-btn-{{ $task->id }}">Ver mais</button>
                    </div>

                    {{-- Ações --}}
                    <div class="d-flex align-items-center flex-shrink-0 gap-2 mt-2 mt-md-0 flex-wrap">
                        {{-- Ícones de status --}}
                        <span class="badge bg-{{ $task->status == 'pendente' ? 'warning' : 'success' }} fs-6">
                            @if($task->status == 'concluída') ✓ @else ⏳ @endif
                        </span>

                        @if($task->status !== 'concluída')
                            <form action="{{ route('tasks.complete', $task) }}" method="POST" class="m-0">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success btn-sm">Concluir</button>
                            </form>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Editar</a>
                        @endif

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

{{-- Scripts --}}
<script>
document.querySelectorAll('.flash-message').forEach(msg => {
    setTimeout(() => msg.remove(), 10000);
});

function toggleDesc(id) {
    const desc = document.getElementById('desc-' + id);
    const btn = document.getElementById('desc-btn-' + id);
    if(btn.innerText === 'Ver mais') {
        desc.style.maxHeight = desc.scrollHeight + "px";
        desc.style.overflow = "visible";
        btn.innerText = 'Ver menos';
    } else {
        desc.style.maxHeight = "3.6em"; 
        desc.style.overflow = "hidden";
        btn.innerText = 'Ver mais';
    }
}


function toggleTitle(id) {
    const title = document.getElementById('title-' + id);
    const btn = document.getElementById('title-btn-' + id);
    if(btn.innerText === 'Ver mais') {
        title.style.maxHeight = "none";
        btn.innerText = 'Ver menos';
    } else {
        title.style.maxHeight = "1.2em"; 
        btn.innerText = 'Ver mais';
    }
}


document.querySelectorAll('.task-desc').forEach(desc => {
    if(desc.scrollHeight > desc.clientHeight) {
        const btn = document.getElementById('desc-btn-' + desc.id.split('-')[1]);
        btn.classList.remove('d-none');
        desc.style.maxHeight = "3.6em"; // 
        desc.style.overflow = "hidden";
    }
});

document.querySelectorAll('.task-title').forEach(title => {
    if(title.scrollHeight > title.clientHeight) {
        const btn = document.getElementById('title-btn-' + title.id.split('-')[1]);
        btn.classList.remove('d-none');
        title.style.maxHeight = "1.2em"; 
        title.style.overflow = "hidden";
    }
});
</script>

{{-- Estilos --}}
<style>
.task-desc, .task-title {
    word-break: break-word;
    overflow-wrap: break-word;
    transition: max-height 0.3s ease;
}

.list-group-item {
    transition: all 0.2s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
}

.btn-link {
    font-size: 0.8rem;
    color: #6f42c1;
}
.btn-link:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .task-info {
        width: 100%;
    }
    .d-flex.flex-shrink-0 {
        width: 100%;
        justify-content: flex-start;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }
}
</style>
@endsection
