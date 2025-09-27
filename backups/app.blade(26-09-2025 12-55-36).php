<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Tarefas</title>
    <!-- Bootstrap CDN (opcional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('tasks.index') }}">Tarefas</a>
                <div class="d-flex">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="me-2">
                            @csrf
                            <button class="btn btn-link">Logout</button>
                        </form>
                    @else
                        <a class="btn btn-link" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-link" href="{{ route('register') }}">Registrar</a>
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
document.addEventListener('DOMContentLoaded', function() {
    const flashMessages = document.querySelectorAll('.flash-message');

    flashMessages.forEach(msg => {
        setTimeout(() => {
            msg.style.transition = 'opacity 0.10s';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }, 5000); 
    });
});
</script>
</body>
</html>
