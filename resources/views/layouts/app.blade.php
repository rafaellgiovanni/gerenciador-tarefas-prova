<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .task-card {
            transition: 0.3s;
        }
        .task-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .flash-message {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9999;
            min-width: 250px;
        }
        .status-badge {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('tasks.index') }}">Gestor de Tarefas</a>
        <div class="d-flex">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="me-2">
                    @csrf
                    <button class="btn btn-outline-primary btn-sm">Logout</button>
                </form>
            @else
                <a class="btn btn-outline-primary btn-sm me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Registrar</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container">

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success flash-message">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger flash-message">{{ session('error') }}</div>
    @endif

    <main>
        @yield('content')
    </main>
</div>

    <script>
        document.querySelectorAll('.flash-message').forEach(msg => {
            setTimeout(() => msg.remove(), 10000);
        });
    </script>
</body>
</html>
