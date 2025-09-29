<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Minhas Tarefas - Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS (assumindo que o Vite está carregando) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-900 text-gray-100 min-h-screen flex items-center justify-center">

        <div class="max-w-4xl mx-auto p-6 lg:p-8 text-center">
            
            <header class="mb-10">
                <h1 class="text-6xl font-extrabold tracking-tight text-blue-400 mb-4">
                    App de Tarefas
                </h1>
                <p class="text-xl text-gray-400">
                    Sua ferramenta simples e eficiente para gerenciar o dia.
                </p>
            </header>

            <main class="flex justify-center space-x-6">
                @if (Route::has('login'))
                    @auth
                        <!-- Se o usuário estiver logado, mostre o link para o Dashboard/Tarefas -->
                        <a href="{{ url('/tasks') }}"
                           class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-xl shadow-lg
                                  text-white bg-green-600 hover:bg-green-700 transition duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-500 focus:ring-opacity-50">
                            Minhas Tarefas
                        </a>
                    @else
                        <!-- Links para Login e Registro -->
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-medium rounded-xl shadow-lg
                                  text-white bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center px-6 py-3 border border-2 border-blue-600 text-lg font-medium rounded-xl shadow-lg
                                      text-blue-400 hover:bg-blue-600 hover:text-white transition duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50">
                                Registrar
                            </a>
                        @endif
                    @endauth
                @endif
            </main>

            <footer class="mt-16 text-sm text-gray-500">
                Criado com Laravel e Tailwind CSS
            </footer>
        </div>
    </body>
</html>
