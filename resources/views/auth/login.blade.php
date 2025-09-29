<x-guest-layout>
    <div class="flex flex-col items-center pt-6 sm:pt-0">

        <!-- Logo/Título -->
        <a href="/">
            <h1 class="text-3xl font-bold text-gray-700">APP DE TAREFAS</h1>
        </a>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                </div>

                <!-- Senha -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-sm text-gray-700">Senha</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                </div>

                <!-- Lembre-se de Mim -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Lembre de mim') }}</span>
                    </label>
                </div>

                <!-- Links à esquerda e botão à direita -->
                <div class="flex items-center justify-between mt-4">
                    <!-- Links -->
                    <div class="flex space-x-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif

                        <a href="{{ route('register') }}"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                            {{ __('Registre-se') }}
                        </a>
                    </div>

                    <!-- Botão Entrar -->
                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Entrar') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
