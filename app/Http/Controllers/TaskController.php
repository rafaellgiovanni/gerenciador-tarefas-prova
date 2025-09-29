<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status') && in_array($request->status, ['pendente', 'concluida'])) {
            $query->where('status', $request->status);
        }

        $tasks = $query->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pendente',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }

    public function toggle(Task $task)
    {
        $task->status = $task->status === 'pendente' ? 'concluida' : 'pendente';
        $task->save();

        return redirect()->back()->with('success', 'Status da tarefa atualizado!');
    }
}
