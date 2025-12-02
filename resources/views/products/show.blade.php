@extends('layouts.app')

@section('title', $product->name)

@section('content')

<!-- Header do Produto -->
<div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
        <p class="text-lg opacity-90 mt-2">{{ $product->category->name ?? 'Sem categoria' }}</p>
    </div>
</div>

<!-- Conteúdo -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        <!-- Galeria -->
        <div>
            <div class="relative h-96 bg-gray-200 rounded-xl flex items-center justify-center overflow-hidden shadow-lg">
                @if($product->thumbnail)
                    <img src="{{ $product->thumbnail_url }}" class="w-full h-full object-cover">
                @else
                    <span class="text-gray-400">Sem imagem</span>
                @endif

                @if($product->hasDiscount())
                    <span class="absolute top-4 right-4 bg-pink-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                        -{{ $product->discount_percentage }}%
                    </span>
                @endif

                @if(!$product->inStock())
                    <span class="absolute top-4 left-4 bg-red-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                        Esgotado
                    </span>
                @endif
            </div>
        </div>

        <!-- Informações do Produto -->
        <div>

            <!-- Categoria -->
            <span class="text-xs text-gray-500 uppercase">{{ $product->category->name ?? 'Sem categoria' }}</span>

            <!-- Nome -->
            <h2 class="text-3xl font-bold text-gray-900 mt-1">{{ $product->name }}</h2>

            <!-- Avaliações -->
            @if($product->reviews_count > 0)
                <div class="flex items-center mt-2">
                    <div class="text-yellow-400 text-lg">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($product->average_rating))
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                    <span class="text-gray-600 text-sm ml-2">
                        {{ $product->reviews_count }} avaliações
                    </span>
                </div>
            @endif

            <!-- Preços -->
            <div class="mt-6">
                @if($product->hasDiscount())
                    <span class="text-gray-400 line-through text-lg block">
                        R$ {{ number_format($product->price, 2, ',', '.') }}
                    </span>
                @endif

                <span class="text-4xl font-bold text-pink-600 block mt-2">
                    R$ {{ number_format($product->final_price, 2, ',', '.') }}
                </span>
            </div>

            <!-- Descrição -->
            <div class="mt-8 text-gray-700 leading-relaxed">
                {!! nl2br(e($product->description)) !!}
            </div>

            <!-- Botão -->
            <div class="mt-10">
                @if($product->inStock())
                    <button class="w-full bg-pink-600 text-white py-3 rounded-lg text-lg font-medium hover:bg-pink-700 transition">
                        Adicionar ao Carrinho
                    </button>
                @else
                    <button disabled class="w-full bg-gray-300 text-gray-500 py-3 rounded-lg text-lg cursor-not-allowed">
                        Produto Esgotado
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Produtos Relacionados -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <div class="mt-20">
            <h3 class="text-2xl font-semibold mb-6 text-gray-900">Produtos Relacionados</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <a href="{{ route('products.show', $related->slug) }}" class="bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden block">
                        <div class="h-48 bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($related->thumbnail)
                                <img src="{{ $related->thumbnail_url }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-400">{{ $related->name }}</span>
                            @endif
                        </div>

                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 text-lg mb-2">{{ $related->name }}</h4>
                            <span class="text-pink-600 text-xl font-bold">
                                R$ {{ number_format($related->final_price, 2, ',', '.') }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>

@endsection
