@extends('layouts.auth')

@section('title', 'Redefinir Senha')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Redefinir Senha
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Digite sua nova senha abaixo
            </p>
        </div>

        <!-- Formulário -->
        <form class="mt-8 space-y-6" action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Mensagens de Erro -->
            @if ($errors->any())
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                Corrija os seguintes erros:
                            </h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="space-y-4">
                <!-- E-mail (somente leitura) -->
                <div>
                    <label for="email-display" class="block text-sm font-medium text-gray-700">
                        E-mail
                    </label>
                    <input 
                        id="email-display" 
                        type="email" 
                        disabled
                        value="{{ $email }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-500 sm:text-sm"
                    >
                </div>

                <!-- Nova Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Nova Senha
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('password') border-red-500 @enderror"
                        placeholder="Mínimo 8 caracteres"
                    >
                    <p class="mt-1 text-xs text-gray-500">
                        A senha deve ter no mínimo 8 caracteres
                    </p>
                </div>

                <!-- Confirmar Senha -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirmar Nova Senha
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        placeholder="Digite a senha novamente"
                    >
                </div>
            </div>

            <!-- Botão Redefinir -->
            <div>
                <button 
                    type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                >
                    Redefinir Senha
                </button>
            </div>

            <!-- Link para Login -->
            <div class="text-center">
                <a href="{{ route('login') }}" class="font-medium text-pink-600 hover:text-pink-500 text-sm">
                    ← Voltar para o login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection