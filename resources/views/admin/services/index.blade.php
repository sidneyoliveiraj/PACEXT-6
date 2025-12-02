@extends('layouts.admin')

@section('title', 'Serviços')

@section('content')
<!-- Header com Ações -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Gerenciar Serviços</h1>
        <p class="text-gray-600 mt-1">Visualize e gerencie todos os serviços oferecidos</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.services.create') }}" class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition font-semibold inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Novo Serviço
        </a>
    </div>
</div>

<!-- Filtros -->
<div class="bg-white rounded-lg shadow-md p-4 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2">
            <input 
                type="text" 
                placeholder="Buscar serviços..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
            >
        </div>
        <div>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                <option>Todas Categorias</option>
                <option>Facial</option>
                <option>Corporal</option>
                <option>Estética Avançada</option>
                <option>Massagens</option>
            </select>
        </div>
    </div>
</div>

<!-- Grid de Serviços -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Serviço 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-xs font-semibold mb-2">
                            Facial
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Limpeza de Pele Profunda</h3>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        Ativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Limpeza profunda que remove impurezas, cravos e células mortas.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 120,00</p>
                        <p class="text-xs text-gray-500">60 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">124 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 1) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Serviço 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-xs font-semibold mb-2">
                            Facial
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Peeling Químico</h3>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        Ativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Renovação celular através de ácidos específicos para manchas e acne.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 200,00</p>
                        <p class="text-xs text-gray-500">45 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">98 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 2) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Serviço 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-xs font-semibold mb-2">
                            Estética Avançada
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Aplicação de Botox</h3>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        Ativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Toxina botulínica para redução de rugas e linhas de expressão.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 800,00</p>
                        <p class="text-xs text-gray-500">30 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">156 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 3) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Serviço 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-semibold mb-2">
                            Corporal
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Drenagem Linfática</h3>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        Ativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Massagem que estimula o sistema linfático e reduz inchaços.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 150,00</p>
                        <p class="text-xs text-gray-500">90 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">187 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 4) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Serviço 5 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-xs font-semibold mb-2">
                            Facial
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Hidratação Profunda</h3>
                    </div>
                    <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                        Inativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Tratamento intensivo de hidratação com ácido hialurônico.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 180,00</p>
                        <p class="text-xs text-gray-500">75 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">142 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 5) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Serviço 6 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
        <div class="md:flex">
            <div class="md:w-1/3 h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">Imagem</span>
            </div>
            <div class="p-6 md:w-2/3">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs font-semibold mb-2">
                            Massagem
                        </span>
                        <h3 class="text-lg font-bold text-gray-900">Massagem Facial Relaxante</h3>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                        Ativo
                    </span>
                </div>

                <p class="text-sm text-gray-600 mb-3">Massagem suave que estimula circulação e alivia tensões.</p>

                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xl font-bold text-pink-600">R$ 90,00</p>
                        <p class="text-xs text-gray-500">45 minutos</p>
                    </div>
                    <div class="text-right">
                        <div class="text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-gray-500">203 avaliações</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', 6) }}" class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        Editar
                    </a>
                    <button class="px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Paginação -->
<div class="mt-8 flex justify-center">
    <nav class="flex gap-2">
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
            Anterior
        </button>
        <button class="px-4 py-2 bg-pink-600 text-white rounded-lg text-sm font-medium">1</button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
            Próxima
        </button>
    </nav>
</div>
@endsection