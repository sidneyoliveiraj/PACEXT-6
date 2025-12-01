@extends('layouts.admin')

@section('title', 'Produtos')

@section('content')
<!-- Header com Ações -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Gerenciar Produtos</h1>
        <p class="text-gray-600 mt-1">Visualize e gerencie todos os produtos da loja</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.products.create') }}" class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition font-semibold inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Novo Produto
        </a>
    </div>
</div>

<!-- Filtros e Busca -->
<div class="bg-white rounded-lg shadow-md p-4 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-2">
            <input 
                type="text" 
                placeholder="Buscar por nome ou SKU..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
            >
        </div>
        <div>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                <option>Todas Categorias</option>
                <option>Limpeza</option>
                <option>Hidratação</option>
                <option>Anti-Idade</option>
                <option>Proteção Solar</option>
            </select>
        </div>
        <div>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                <option>Todos Status</option>
                <option>Ativo</option>
                <option>Inativo</option>
                <option>Estoque Baixo</option>
            </select>
        </div>
    </div>
</div>

<!-- Tabela de Produtos -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Produto
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        SKU
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Categoria
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Preço
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Estoque
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Produto 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                            <div class="ml-4">
                                <p class="font-medium text-gray-900">Sérum Facial Anti-Idade</p>
                                <p class="text-sm text-gray-500">Com Vitamina C - 30ml</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        SER-001
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        Anti-Idade
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">R$ 149,90</p>
                        <p class="text-xs text-gray-500">Promo: R$ 127,42</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">
                            2 unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            Ativo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', 1) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Produto 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                            <div class="ml-4">
                                <p class="font-medium text-gray-900">Creme Hidratante Facial</p>
                                <p class="text-sm text-gray-500">Hidratação 24h - 50g</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        CRE-005
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        Hidratação
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">R$ 89,90</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-orange-100 text-orange-800 text-xs font-medium rounded-full">
                            8 unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            Ativo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', 2) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Produto 3 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                            <div class="ml-4">
                                <p class="font-medium text-gray-900">Protetor Solar FPS 60</p>
                                <p class="text-sm text-gray-500">Proteção UVA/UVB - 60g</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        PRO-018
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        Proteção Solar
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">R$ 69,90</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            45 unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            Ativo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', 3) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Produto 4 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                            <div class="ml-4">
                                <p class="font-medium text-gray-900">Máscara Facial Detox</p>
                                <p class="text-sm text-gray-500">Argila Verde - 100g</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        MAS-012
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        Limpeza
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">R$ 59,90</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-orange-100 text-orange-800 text-xs font-medium rounded-full">
                            5 unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                            Inativo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', 4) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Produto 5 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                            <div class="ml-4">
                                <p class="font-medium text-gray-900">Creme para Olhos</p>
                                <p class="text-sm text-gray-500">Anti-Olheiras - 15ml</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        CRE-023
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        Anti-Idade
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-900">R$ 79,90</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            32 unidades
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                            Ativo
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right text-sm">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.products.edit', 5) }}" class="text-blue-600 hover:text-blue-800" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <button class="text-red-600 hover:text-red-800" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="bg-white px-6 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">156</span> produtos
            </p>
            <nav class="flex gap-2">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Anterior
                </button>
                <button class="px-4 py-2 bg-pink-600 text-white rounded-lg text-sm font-medium">1</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">3</button>
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Próxima
                </button>
            </nav>
        </div>
    </div>
</div>
@endsection