@extends('layouts.auth')

@section('title', 'Cadastro')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full space-y-8">
        <!-- Header -->
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Crie sua conta
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Já tem uma conta?
                <a href="{{ route('login') }}" class="font-medium text-pink-600 hover:text-pink-500">
                    Faça login
                </a>
            </p>
        </div>

        <!-- Formulário de Cadastro -->
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf

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

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Nome Completo -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Nome Completo *
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        required
                        value="{{ old('name') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('name') border-red-500 @enderror"
                    >
                </div>

                <!-- E-mail -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        E-mail *
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        required
                        value="{{ old('email') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('email') border-red-500 @enderror"
                    >
                </div>

                <!-- Telefone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">
                        Telefone
                    </label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone"
                        value="{{ old('phone') }}"
                        placeholder="(00) 00000-0000"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('phone') border-red-500 @enderror"
                    >
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Senha *
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('password') border-red-500 @enderror"
                    >
                    <p class="mt-1 text-xs text-gray-500">Mínimo de 8 caracteres</p>
                </div>

                <!-- Confirmar Senha -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        Confirmar Senha *
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                    >
                </div>

                <!-- Endereço -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">
                        Endereço
                    </label>
                    <input 
                        type="text" 
                        name="address" 
                        id="address"
                        value="{{ old('address') }}"
                        placeholder="Rua, número e complemento"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('address') border-red-500 @enderror"
                    >
                </div>

                <!-- Cidade -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">
                        Cidade
                    </label>
                    <input 
                        type="text" 
                        name="city" 
                        id="city"
                        value="{{ old('city') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('city') border-red-500 @enderror"
                    >
                </div>

                <!-- Estado -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">
                        Estado
                    </label>
                    <select 
                        name="state" 
                        id="state"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('state') border-red-500 @enderror"
                    >
                        <option value="">Selecione</option>
                        <option value="AC" {{ old('state') == 'AC' ? 'selected' : '' }}>Acre</option>
                        <option value="AL" {{ old('state') == 'AL' ? 'selected' : '' }}>Alagoas</option>
                        <option value="AP" {{ old('state') == 'AP' ? 'selected' : '' }}>Amapá</option>
                        <option value="AM" {{ old('state') == 'AM' ? 'selected' : '' }}>Amazonas</option>
                        <option value="BA" {{ old('state') == 'BA' ? 'selected' : '' }}>Bahia</option>
                        <option value="CE" {{ old('state') == 'CE' ? 'selected' : '' }}>Ceará</option>
                        <option value="DF" {{ old('state') == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                        <option value="ES" {{ old('state') == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                        <option value="GO" {{ old('state') == 'GO' ? 'selected' : '' }}>Goiás</option>
                        <option value="MA" {{ old('state') == 'MA' ? 'selected' : '' }}>Maranhão</option>
                        <option value="MT" {{ old('state') == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                        <option value="MS" {{ old('state') == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                        <option value="MG" {{ old('state') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <option value="PA" {{ old('state') == 'PA' ? 'selected' : '' }}>Pará</option>
                        <option value="PB" {{ old('state') == 'PB' ? 'selected' : '' }}>Paraíba</option>
                        <option value="PR" {{ old('state') == 'PR' ? 'selected' : '' }}>Paraná</option>
                        <option value="PE" {{ old('state') == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                        <option value="PI" {{ old('state') == 'PI' ? 'selected' : '' }}>Piauí</option>
                        <option value="RJ" {{ old('state') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="RN" {{ old('state') == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                        <option value="RS" {{ old('state') == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                        <option value="RO" {{ old('state') == 'RO' ? 'selected' : '' }}>Rondônia</option>
                        <option value="RR" {{ old('state') == 'RR' ? 'selected' : '' }}>Roraima</option>
                        <option value="SC" {{ old('state') == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                        <option value="SP" {{ old('state') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="SE" {{ old('state') == 'SE' ? 'selected' : '' }}>Sergipe</option>
                        <option value="TO" {{ old('state') == 'TO' ? 'selected' : '' }}>Tocantins</option>
                    </select>
                </div>

                <!-- CEP -->
                <div class="md:col-span-2">
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">
                        CEP
                    </label>
                    <input 
                        type="text" 
                        name="zip_code" 
                        id="zip_code"
                        value="{{ old('zip_code') }}"
                        placeholder="00000-000"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('zip_code') border-red-500 @enderror"
                    >
                </div>
            </div>

            <!-- Termos de Uso e LGPD -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input 
                        id="terms" 
                        name="terms" 
                        type="checkbox" 
                        required
                        class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded @error('terms') border-red-500 @enderror"
                    >
                </div>
                <div class="ml-3 text-sm">
                    <label for="terms" class="font-medium text-gray-700">
                        Eu concordo com os 
                        <a href="/termos" target="_blank" class="text-pink-600 hover:text-pink-500">Termos de Uso</a> 
                        e a 
                        <a href="/privacidade" target="_blank" class="text-pink-600 hover:text-pink-500">Política de Privacidade</a>
                    </label>
                    <p class="text-gray-500 mt-1">
                        Seus dados serão tratados conforme a LGPD. Você pode solicitar a exclusão de seus dados a qualquer momento.
                    </p>
                </div>
            </div>

            <!-- Botão de Cadastro -->
            <div>
                <button 
                    type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
                >
                    Criar Conta
                </button>
            </div>

            <!-- Link para Login -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Já tem uma conta?
                    <a href="{{ route('login') }}" class="font-medium text-pink-600 hover:text-pink-500">
                        Faça login aqui
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
    // Máscara para telefone
    document.getElementById('phone').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 11) {
            value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
            value = value.replace(/(\d)(\d{4})$/, '$1-$2');
        }
        e.target.value = value;
    });

    // Máscara para CEP
    document.getElementById('zip_code').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length <= 8) {
            value = value.replace(/^(\d{5})(\d)/, '$1-$2');
        }
        e.target.value = value;
    });
</script>
@endsection

<!-- Revisado - Lucas -->