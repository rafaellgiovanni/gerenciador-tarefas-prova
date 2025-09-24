<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link com o usuário
        $table->string('title');                                          // Título da tarefa
        $table->text('description')->nullable();                          // Descrição (pode ser vazia)
        $table->string('status')->default('pendente');                    // Status (padrão: 'pendente')
        $table->timestamps();                                             // Campos 'created_at' e 'updated_at'
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
