<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;


// Rota da página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rota do dashboard, protegida por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota do perfil, protegida por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tasks', TaskController::class);
});

// Rota MANUAL das tarefas (substitui Route::resource)
Route::middleware('auth')->group(function () {
    // Rota para a lista de tarefas
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Rota para o formulário de criação
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

    // Rota para salvar a nova tarefa
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // Rotas de edição e exclusão (opcional, mas recomendado)
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

require __DIR__.'/auth.php';