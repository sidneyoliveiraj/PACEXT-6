@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4">Nossos Produtos</h1>
        <p class="text-xl opacity-90">Linha completa de skincare premium para sua pele</p>
    </div>
</div>

<!-- Filtros e Busca -->
<div class="bg-white border-b sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <!-- Busca -->
            <div class="w-full md:w-96">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar produtos..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                >
            </div>

            <!-- Filtros -->
            <div class="flex gap-4 w-full md:w-auto">
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" onchange="this.form.submit()">
                    <option value="">Todas Categorias</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }} ({{ $category->products_count }})
                        </option>
                    @endforeach
                </select>

                <select name="sort" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" onchange="this.form.submit()">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mais Recentes</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Menor Preço</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Maior Preço</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nome A-Z</option>
                </select>

                <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                    Filtrar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Grid de Produtos -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($products->count() > 0)
        <div class="mb-6">
            <p class="text-gray-600">
                Mostrando {{ $products->firstItem() }} - {{ $products->lastItem() }} de {{ $products->total() }} produtos
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
                    <a href="{{ route('products.show', $product->slug) }}" class="block">
                        <div class="relative">
                            <div class="h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                                @if($product->thumbnail)
                                    <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-gray-400">{{ $product->name }}</span>
                                @endif
                            </div>
                            
                            @if($product->hasDiscount())
                                <span class="absolute top-2 right-2 bg-pink-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    -{{ $product->discount_percentage }}%
                                </span>
                            @endif

                            @if(!$product->inStock())
                                <span class="absolute top-2 left-2 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    Esgotado
                                </span>
                            @endif
                        </div>
                    </a>
                    
                    <div class="p-4">
                        <span class="text-xs text-gray-500 uppercase">{{ $product->category->name ?? 'Sem categoria' }}</span>
                        <a href="{{ route('products.show', $product->slug) }}">
                            <h3 class="text-lg font-semibold text-gray-900 mt-1 mb-2 hover:text-pink-600">
                                {{ $product->name }}
                            </h3>
                        </a>
                        
                        @if($product->reviews_count > 0)
                            <div class="flex items-center mb-2">
                                <div class="text-yellow-400 text-sm">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($product->average_rating))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-gray-600 text-sm ml-2">({{ $product->reviews_count }})</span>
                            </div>
                        @endif

                        <div class="flex items-center justify-between mb-4">
                            <div>
                                @if($product->hasDiscount())
                                    <span class="text-gray-400 line-through text-sm">
                                        R$ {{ number_format($product->price, 2, ',', '.') }}
                                    </span>
                                @endif
                                <span class="text-2xl font-bold text-pink-600 {{ $product->hasDiscount() ? 'ml-2 block' : '' }}">
                                    R$ {{ number_format($product->final_price, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        @if($product->inStock())
                            <button class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition font-medium">
                                Adicionar ao Carrinho
                            </button>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 py-2 rounded-lg cursor-not-allowed font-medium">
                                Produto Esgotado
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-6xl mb-4">🔍</div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Nenhum produto encontrado</h3>
            <p class="text-gray-600 mb-6">Tente ajustar seus filtros de busca</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition">
                Ver Todos os Produtos
            </a>
        </div>
    @endif

    <!-- Paginação -->
    <div class="mt-12 flex justify-center">
        <nav class="flex gap-2">
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Anterior</button>
            <button class="px-4 py-2 bg-pink-600 text-white rounded-lg">1</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
            <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Próxima</button>
        </nav>
    </div>
</div>
@endsection