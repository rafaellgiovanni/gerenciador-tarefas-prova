<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Exibe a lista de tarefas do usuário logado.
     */
    public function index()
{
     $tasks = Auth::user()->tasks()->latest()->paginate(10);

    return view('tasks.index', compact('tasks'));
}

    /**
     * Mostra o formulário de criação de uma nova tarefa.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Armazena uma nova tarefa no banco.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->route('tasks.index')
                         ->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Exibe os detalhes de uma tarefa específica.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Mostra o formulário de edição de uma tarefa existente.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Atualiza uma tarefa no banco.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
                         ->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove uma tarefa do banco.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Tarefa excluída com sucesso!');
    }
}