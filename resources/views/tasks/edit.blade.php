<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Título:</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
    </div>
    <div>
        <label for="description">Descrição:</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
    </div>
    <button type="submit">Atualizar</button>
</form>
