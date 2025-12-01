@extends('layouts.admin')

@section('title', 'Novo Produto')

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
        <li class="text-pink-600 font-medium">Novo Produto</li>
    </ol>
</nav>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

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
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="Ex: Sérum Facial Anti-Idade"
                        >
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
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="Breve descrição do produto"
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
                            placeholder="Descrição detalhada do produto, benefícios, modo de uso, etc."
                        ></textarea>
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
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="Ex: SER-001"
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
                            required
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="0"
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
                            required
                            step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="0.00"
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
                            step="0.01"
                            min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                            placeholder="0.00"
                        >
                        <p class="text-xs text-gray-500 mt-1">Deixe vazio se não houver promoção</p>
                    </div>
                </div>
            </div>

            <!-- Imagens -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Imagens do Produto</h2>

                <!-- Imagem Principal -->
                <div class="mb-6">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">
                        Imagem Principal *
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-pink-500 transition">
                        <input 
                            type="file" 
                            id="thumbnail" 
                            name="thumbnail"
                            accept="image/*"
                            required
                            class="hidden"
                            onchange="previewImage(event, 'preview-thumbnail')"
                        >
                        <label for="thumbnail" class="cursor-pointer">
                            <div id="preview-thumbnail" class="mb-4">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Clique para fazer upload</p>
                            <p class="text-xs text-gray-500 mt-1">PNG, JPG até 2MB</p>
                        </label>
                    </div>
                </div>

                <!-- Galeria -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                        Galeria de Imagens (até 5 imagens)
                    </label>
                    <input 
                        type="file" 
                        id="images" 
                        name="images[]"
                        accept="image/*"
                        multiple
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                    >
                    <p class="text-xs text-gray-500 mt-1">Selecione múltiplas imagens</p>
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
                                class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">Produto em Destaque</span>
                        </label>
                        <p class="text-xs text-gray-500 mt-1 ml-6">Aparecerá na home</p>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Botões de Ação -->
                <div class="space-y-2">
                    <button 
                        type="submit"
                        class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition font-semibold"
                    >
                        Publicar Produto
                    </button>
                    <a 
                        href="{{ route('admin.products.index') }}"
                        class="w-full block text-center bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition font-semibold"
                    >
                        Cancelar
                    </a>
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
                    <option value="3">Anti-Idade</option>
                    <option value="4">Proteção Solar</option>
                    <option value="5">Tratamentos</option>
                    <option value="6">Olhos</option>
                    <option value="7">Máscaras</option>
                </select>
            </div>

            <!-- Informações Adicionais -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="font-semibold text-blue-900 mb-2">💡 Dicas</h3>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• Use imagens de alta qualidade</li>
                    <li>• Seja descritivo nos detalhes</li>
                    <li>• Mantenha o estoque atualizado</li>
                    <li>• Use palavras-chave relevantes</li>
                </ul>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    function previewImage(event, previewId) {
        const preview = document.getElementById(previewId);
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="max-h-48 mx-auto rounded-lg">`;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection