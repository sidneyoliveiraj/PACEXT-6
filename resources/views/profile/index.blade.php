@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-pink-600">Home</a></li>
                <li><span class="text-gray-400 mx-2">/</span></li>
                <li class="text-pink-600 font-medium">Meu Perfil</li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Menu Lateral -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <!-- Avatar -->
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <span class="text-3xl text-pink-600 font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ Auth::user()->name }}</h3>
                        <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                    </div>

                    <!-- Menu -->
                    <nav class="space-y-2">
                        <a href="#dados" class="flex items-center gap-3 px-4 py-3 bg-pink-50 text-pink-600 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Dados Pessoais
                        </a>
                        <a href="#endereco" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Endereço
                        </a>
                        <a href="#senha" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Alterar Senha
                        </a>
                        <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Meus Pedidos
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Sair
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="lg:col-span-3">
                <!-- Dados Pessoais -->
                <div id="dados" class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Dados Pessoais</h2>
                        <button class="text-pink-600 hover:text-pink-700 font-medium">Editar</button>
                    </div>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nome -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                                <input 
                                    type="text" 
                                    value="{{ Auth::user()->name }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                >
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                                <input 
                                    type="email" 
                                    value="{{ Auth::user()->email }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 bg-gray-50"
                                    disabled
                                >
                            </div>

                            <!-- Telefone -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                                <input 
                                    type="text" 
                                    value="{{ Auth::user()->phone }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                >
                            </div>

                            <!-- Data de Nascimento -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
                                <input 
                                    type="date" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                >
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 transition font-semibold">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Endereço -->
                <div id="endereco" class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Endereço</h2>
                        <button class="text-pink-600 hover:text-pink-700 font-medium">Editar</button>
                    </div>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- CEP -->
                            <div class="md:w-1/2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">CEP</label>
                                <input 
                                    type="text" 
                                    value="{{ Auth::user()->zip_code }}"
                                    placeholder="00000-000"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                >
                            </div>

                            <!-- Endereço -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                                <input 
                                    type="text" 
                                    value="{{ Auth::user()->address }}"
                                    placeholder="Rua, número e complemento"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                >
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Cidade -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Cidade</label>
                                    <input 
                                        type="text" 
                                        value="{{ Auth::user()->city }}"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                    >
                                </div>

                                <!-- Estado -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                                        <option value="{{ Auth::user()->state }}" selected>{{ Auth::user()->state }}</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="SC">Santa Catarina</option>
                                        <!-- Outros estados -->
                                    </select>
                                </div>

                                <!-- Bairro -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bairro</label>
                                    <input 
                                        type="text" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 transition font-semibold">
                                Salvar Endereço
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Alterar Senha -->
                <div id="senha" class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Alterar Senha</h2>

                    <form class="space-y-6">
                        <!-- Senha Atual -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Senha Atual</label>
                            <input 
                                type="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            >
                        </div>

                        <!-- Nova Senha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nova Senha</label>
                            <input 
                                type="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            >
                            <p class="text-sm text-gray-600 mt-1">Mínimo de 8 caracteres</p>
                        </div>

                        <!-- Confirmar Nova Senha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Nova Senha</label>
                            <input 
                                type="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            >
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 transition font-semibold">
                                Alterar Senha
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection