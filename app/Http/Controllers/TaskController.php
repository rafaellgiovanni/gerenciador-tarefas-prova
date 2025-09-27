<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request)
    {
 
        $tasks = auth()->user()
            ->tasks()
            ->orderByRaw("CASE WHEN status = 'pendente' THEN 0 ELSE 1 END"); // pendentes primeiro

        // Filtro por status
        if ($request->status) {
            $tasks->where('status', $request->status);
        }

        $tasks = $tasks->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

   
    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pendente',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }


    public function edit(Task $task)
    {

        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pendente,concluída,em_andamento',
        ]);

        $task->update($request->only('title', 'description', 'status'));

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
    }

 
    public function complete(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->update(['status' => 'concluída']);

        return redirect()->route('tasks.index')->with('success', 'Tarefa concluída com sucesso!');
    }
}
