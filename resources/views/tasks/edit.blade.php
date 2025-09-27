@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center">Editar Tarefa</h1>

    <div class="card shadow-sm p-3 mb-4" style="border-radius:0.5rem;">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Título --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Título</label>
                <input type="text" name="title" value="{{ old('title', $task->title) }}" 
                       class="form-control task-title" required maxlength="255">
                @error('title') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            {{-- Descrição --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Descrição</label>
                <textarea name="description" class="form-control task-desc" required>{{ old('description', $task->description) }}</textarea>
                @error('description') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-primary" type="submit">Atualizar</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

{{-- Scripts para truncar título e descrição se necessário --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    const truncateText = (el, maxLength) => {
        if (el.value.length > maxLength) {
            el.value = el.value.substring(0, maxLength) + '...';
        }
    }

    const titleInput = document.querySelector('.task-title');
    const descInput = document.querySelector('.task-desc');

    if(titleInput) truncateText(titleInput, 50);
    if(descInput) truncateText(descInput, 150);
});
</script>

{{-- Estilo --}}
<style>
.task-desc, .task-title {
    width: 100%;
    box-sizing: border-box;
}

@media (max-width: 576px) {
    .task-desc, .task-title {
        font-size: 0.9rem;
    }
}
</style>
@endsection
