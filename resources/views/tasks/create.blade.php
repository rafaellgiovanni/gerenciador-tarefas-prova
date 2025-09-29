<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <button type="submit">Salvar</button>
</form>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
