@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Tarefa</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
            {{ $task->title }}
        </div>
        <div class="card-body">
            <p>{{ $task->description ?? 'Sem descrição.' }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-3">Voltar</a>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning mt-3">Editar</a>
</div>
@endsection
