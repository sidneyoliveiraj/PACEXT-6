@extends('layouts.admin')

@section('title', 'Editar Produto')

@section('content')
<!-- Breadcrumb -->
<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-pink-600">Dashboard</a>
        </li>
        <li><span class="text-gray-400 mx-2">/</span></li>
        <li>
            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-pink-600">Produtos</a>
        </li>
        <li><span class="text-gray-400 mx-2">/</span></li>
        <li class="text-pink-600 font-medium">Editar Produto</li>
    </ol>
</nav>

<form action="{{ route('admin.products.update', $id ?? 1) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Formulário Principal -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Informações Básicas -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Informações Básicas</h2>

                <div class="space-y-4">
                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nome do Produto *
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name"
                            value="Sérum Facial Anti-Idade"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug (URL)
                        </label>
                        <input 
                            type="text" 
                            id="slug" 
                            name="slug"
                            value="serum-facial-anti-idade"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 bg-gray-50"
                            readonly
                        >
                        <p class="text-xs text-gray-500 mt-1">Gerado automaticamente</p>
                    </div>

                    <!-- Descrição Curta -->
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Descrição Curta *
                        </label>
                        <input 
                            type="text" 
                            id="short_description" 
                            name="short_description"
                            value="Sérum com vitamina C - 30ml"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <!-- Descrição Completa -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Descrição Completa *
                        </label>
                        <textarea 
                            id="description" 
                            name="description"
                            rows="6"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >Sérum facial de alta performance com vitamina C pura. Combate sinais de envelhecimento, uniformiza o tom da pele e proporciona luminosidade imediata. Indicado para todos os tipos de pele.</textarea>
                    </div>
                </div>
            </div>

            <!-- Preço e Estoque -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Preço e Estoque</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- SKU -->
                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">
                            SKU *
                        </label>
                        <input 
                            type="text" 
                            id="sku" 
                            name="sku"
                            value="SER-001"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <!-- Quantidade -->
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Quantidade em Estoque *
                        </label>
                        <input 
                            type="number" 
                            id="quantity" 
                            name="quantity"
                            value="2"
                            required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <!-- Preço Normal -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Preço Normal (R$) *
                        </label>
                        <input 
                            type="number" 
                            id="price" 
                            name="price"
                            value="149.90"
                            required
                            step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <!-- Preço Promocional -->
                    <div>
                        <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-2">
                            Preço Promocional (R$)
                        </label>
                        <input 
                            type="number" 
                            id="sale_price" 
                            name="sale_price"
                            value="127.42"
                            step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                        <p class="text-xs text-gray-500 mt-1">Deixe vazio se não houver promoção</p>
                    </div>
                </div>
            </div>

            <!-- Imagens Atuais -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Imagens do Produto</h2>

                <!-- Imagem Principal Atual -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Imagem Principal Atual
                    </label>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex-shrink-0"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-600">serum-facial.jpg</p>
                            <p class="text-xs text-gray-500">Última atualização: 15/11/2024</p>
                        </div>
                        <button type="button" class="text-red-600 hover:text-red-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Upload Nova Imagem Principal -->
                <div class="mb-6">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">
                        Alterar Imagem Principal
                    </label>
                    <input 
                        type="file" 
                        id="thumbnail" 
                        name="thumbnail"
                        accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    >
                </div>

                <!-- Galeria Atual -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Galeria Atual
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="relative group">
                            <div class="w-full h-32 bg-gray-200 rounded-lg"></div>
                            <button type="button" class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative group">
                            <div class="w-full h-32 bg-gray-200 rounded-lg"></div>
                            <button type="button" class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative group">
                            <div class="w-full h-32 bg-gray-200 rounded-lg"></div>
                            <button type="button" class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-lg opacity-0 group-hover:opacity-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Upload Novas Imagens -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Adicionar Mais Imagens
                    </label>
                    <input 
                        type="file" 
                        id="images" 
                        name="images[]"
                        accept="image/*"
                        multiple
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    >
                </div>
            </div>

            <!-- SEO -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO (Otimização)</h2>

                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Title
                        </label>
                        <input 
                            type="text" 
                            id="meta_title" 
                            name="meta_title"
                            value="Sérum Facial Anti-Idade com Vitamina C | Clínica Estética"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Description
                        </label>
                        <textarea 
                            id="meta_description" 
                            name="meta_description"
                            rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >Sérum facial anti-idade com vitamina C pura. Combate sinais de envelhecimento e proporciona luminosidade. Compre online com frete grátis.</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Publicação -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Publicação</h2>

                <div class="space-y-4">
                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="is_active"
                                value="1"
                                checked
                                class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">Produto Ativo</span>
                        </label>
                    </div>

                    <!-- Destaque -->
                    <div>
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="is_featured"
                                value="1"
                                checked
                                class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">Produto em Destaque</span>
                        </label>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Informações -->
                <div class="text-sm text-gray-600 space-y-2">
                    <p><strong>Criado em:</strong> 01/11/2024</p>
                    <p><strong>Última edição:</strong> 15/11/2024</p>
                    <p><strong>Total de vendas:</strong> 127 unidades</p>
                </div>

                <hr class="my-4">

                <!-- Botões de Ação -->
                <div class="space-y-2">
                    <button 
                        type="submit"
                        class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition font-semibold"
                    >
                        Atualizar Produto
                    </button>
                    <a 
                        href="{{ route('admin.products.index') }}"
                        class="w-full block text-center bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition font-semibold"
                    >
                        Cancelar
                    </a>
                    <button 
                        type="button"
                        onclick="return confirm('Tem certeza que deseja excluir este produto?')"
                        class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition font-semibold"
                    >
                        Excluir Produto
                    </button>
                </div>
            </div>

            <!-- Categoria -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Categoria</h2>

                <select 
                    name="category_id" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                >
                    <option value="">Selecione uma categoria</option>
                    <option value="1">Limpeza</option>
                    <option value="2">Hidratação</option>
                    <option value="3" selected>Anti-Idade</option>
                    <option value="4">Proteção Solar</option>
                    <option value="5">Tratamentos</option>
                    <option value="6">Olhos</option>
                    <option value="7">Máscaras</option>
                </select>
            </div>

            <!-- Estatísticas -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Estatísticas</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Visualizações</span>
                        <span class="text-sm font-semibold text-gray-900">2.456</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Vendas</span>
                        <span class="text-sm font-semibold text-gray-900">127</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Avaliações</span>
                        <span class="text-sm font-semibold text-gray-900">48 (4.8★)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Taxa Conversão</span>
                        <span class="text-sm font-semibold text-green-600">5.2%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection