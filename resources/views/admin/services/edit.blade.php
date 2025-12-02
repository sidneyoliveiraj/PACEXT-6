@extends('layouts.admin')

@section('title', 'Editar Serviço')

@section('content')
<!-- Breadcrumb -->
<nav class="flex mb-6" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-pink-600">Dashboard</a>
        </li>
        <li><span class="text-gray-400 mx-2">/</span></li>
        <li>
            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-pink-600">Serviços</a>
        </li>
        <li><span class="text-gray-400 mx-2">/</span></li>
        <li class="text-pink-600 font-medium">Editar Serviço</li>
    </ol>
</nav>

<form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
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
                            Nome do Serviço *
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name"
                            value="{{ old('name', $service->name) }}"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('name') border-red-500 @enderror"
                        >
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('slug', $service->slug) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 bg-gray-50"
                            readonly
                        >
                        <p class="text-xs text-gray-500 mt-1">Gerado automaticamente a partir do nome</p>
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
                            value="{{ old('short_description', $service->short_description) }}"
                            required
                            maxlength="500"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('short_description') border-red-500 @enderror"
                        >
                        @error('short_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descrição Completa -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Descrição Completa *
                        </label>
                        <textarea 
                            id="description" 
                            name="description"
                            rows="8"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('description') border-red-500 @enderror"
                        >{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Preço e Duração -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Preço e Duração</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Preço -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Preço (R$) *
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">R$</span>
                            <input 
                                type="number" 
                                id="price" 
                                name="price"
                                value="{{ old('price', $service->price) }}"
                                required
                                step="0.01"
                                min="0"
                                class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('price') border-red-500 @enderror"
                            >
                        </div>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duração -->
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                            Duração (minutos) *
                        </label>
                        <input 
                            type="number" 
                            id="duration" 
                            name="duration"
                            value="{{ old('duration', $service->duration) }}"
                            required
                            min="1"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('duration') border-red-500 @enderror"
                        >
                        @error('duration')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Imagem -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Imagem do Serviço</h2>

                <!-- Imagem Atual -->
                @if($service->thumbnail)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Imagem Atual
                    </label>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->name }}" class="w-32 h-32 object-cover rounded-lg">
                        <div class="flex-1">
                            <p class="text-sm text-gray-600">{{ basename($service->thumbnail) }}</p>
                            <p class="text-xs text-gray-500">Última atualização: {{ $service->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <button 
                            type="button" 
                            onclick="return confirm('Tem certeza que deseja remover esta imagem?')"
                            class="text-red-600 hover:text-red-800"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endif

                <!-- Upload Nova Imagem -->
                <div>
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $service->thumbnail ? 'Alterar Imagem' : 'Imagem Principal *' }}
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-pink-500 transition">
                        <input 
                            type="file" 
                            id="thumbnail" 
                            name="thumbnail"
                            accept="image/*"
                            {{ !$service->thumbnail ? 'required' : '' }}
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
                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
                            value="{{ old('meta_title', $service->meta_title ?? $service->name . ' | Clínica Estética') }}"
                            maxlength="60"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                        <p class="text-xs text-gray-500 mt-1">Máximo 60 caracteres</p>
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Description
                        </label>
                        <textarea 
                            id="meta_description" 
                            name="meta_description"
                            rows="3"
                            maxlength="160"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >{{ old('meta_description', $service->meta_description ?? $service->short_description) }}</textarea>
                        <p class="text-xs text-gray-500 mt-1">Máximo 160 caracteres</p>
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
                                {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">Serviço Ativo</span>
                        </label>
                    </div>

                    <!-- Destaque -->
                    <div>
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="is_featured"
                                value="1"
                                {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
                                class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500"
                            >
                            <span class="ml-2 text-sm text-gray-700">Serviço em Destaque</span>
                        </label>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Informações -->
                <div class="text-sm text-gray-600 space-y-2">
                    <p><strong>Criado em:</strong> {{ $service->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Última edição:</strong> {{ $service->updated_at->format('d/m/Y H:i') }}</p>
                    @if($service->orderItems()->exists())
                        <p><strong>Total de agendamentos:</strong> {{ $service->orderItems()->count() }}</p>
                    @endif
                </div>

                <hr class="my-4">

                <!-- Botões de Ação -->
                <div class="space-y-2">
                    <button 
                        type="submit"
                        class="w-full bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-700 transition font-semibold"
                    >
                        Atualizar Serviço
                    </button>
                    <a 
                        href="{{ route('admin.services.index') }}"
                        class="w-full block text-center bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition font-semibold"
                    >
                        Cancelar
                    </a>
                    <button 
                        type="button"
                        onclick="if(confirm('Tem certeza que deseja excluir este serviço?')) { document.getElementById('delete-form').submit(); }"
                        class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition font-semibold"
                    >
                        Excluir Serviço
                    </button>
                </div>
            </div>

            <!-- Categoria -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Categoria</h2>

                <select 
                    name="category_id" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error('category_id') border-red-500 @enderror"
                >
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Estatísticas -->
            @if($service->reviews()->exists())
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Estatísticas</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Avaliações</span>
                        <span class="text-sm font-semibold text-gray-900">
                            {{ $service->reviews()->count() }} 
                            ({{ number_format($service->reviews()->avg('rating'), 1) }}★)
                        </span>
                    </div>
                    @if($service->orderItems()->exists())
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Agendamentos</span>
                        <span class="text-sm font-semibold text-gray-900">{{ $service->orderItems()->count() }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Receita Total</span>
                        <span class="text-sm font-semibold text-green-600">
                            R$ {{ number_format($service->orderItems()->sum('price'), 2, ',', '.') }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</form>

<!-- Form de Delete (oculto) -->
<form id="delete-form" action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
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