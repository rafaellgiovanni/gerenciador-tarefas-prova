<x-guest-layout>
    <div class="flex flex-col items-center pt-6 sm:pt-0">

        <!-- Logo/Título Simples -->
        <a href="/">
            <h1 class="text-3xl font-bold text-gray-700">APP DE TAREFAS</h1>
        </a>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Erro de validação foi removido para evitar travamento -->

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Campo Nome -->
                <div>
                    <label for="name" class="block font-medium text-sm text-gray-700">Nome</label>
                    <input id="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Campo Email -->
                <div class="mt-4">
                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                    <input id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Campo Senha -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">Senha</label>
                    <input id="password" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Campo Confirmação de Senha -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirme a Senha</label>
                    <input id="password_confirmation" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <!-- BLOCO REMOVIDO: Termos de Serviço que dependia do Jetstream -->

                <!-- Botões e Links -->
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Já está registrado?') }}
                    </a>

                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4">
                        {{ __('Registrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
