@extends('layouts.app')

@section('content')
<h1>Criar Nova Tarefa</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="title" required maxlength="255">
        
        <label>Descrição:</label>
        <textarea name="description" required></textarea>
        
        <button type="submit">Salvar</button>
    </form>
    @endsection
