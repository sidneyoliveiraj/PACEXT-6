@extends('layouts.app')

@section('title', 'Carrinho de Compras')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-pink-600">Home</a></li>
                <li><span class="text-gray-400 mx-2">/</span></li>
                <li class="text-pink-600 font-medium">Carrinho</li>
            </ol>
        </nav>

        <h1 class="text-3xl font-bold text-gray-900 mb-8">Carrinho de Compras</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de Produtos -->
            <div class="lg:col-span-2">
                <!-- Carrinho Vazio -->
                <div id="empty-cart" class="bg-white rounded-lg shadow-md p-8 text-center hidden">
                    <div class="text-6xl mb-4">🛒</div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Seu carrinho está vazio</h2>
                    <p class="text-gray-600 mb-6">Adicione produtos ao carrinho para continuar comprando</p>
                    <a href="{{ route('products.index') }}" class="inline-block bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition font-semibold">
                        Ver Produtos
                    </a>
                </div>

                <!-- Produtos no Carrinho -->
                <div id="cart-items" class="space-y-4">
                    <!-- Item 1 -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center gap-6">
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                            <span class="text-gray-400 text-xs">Imagem</span>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Sérum Facial Anti-Idade</h3>
                            <p class="text-sm text-gray-600 mb-2">Sérum com vitamina C - 30ml</p>
                            <p class="text-xl font-bold text-pink-600">R$ 149,90</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">−</span>
                            </button>
                            <span class="text-gray-900 font-semibold w-8 text-center">1</span>
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">+</span>
                            </button>
                        </div>

                        <button class="text-red-500 hover:text-red-700 ml-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Item 2 -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center gap-6">
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                            <span class="text-gray-400 text-xs">Imagem</span>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Creme Hidratante Facial</h3>
                            <p class="text-sm text-gray-600 mb-2">Hidratação 24h - 50g</p>
                            <p class="text-xl font-bold text-pink-600">R$ 89,90</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">−</span>
                            </button>
                            <span class="text-gray-900 font-semibold w-8 text-center">2</span>
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">+</span>
                            </button>
                        </div>

                        <button class="text-red-500 hover:text-red-700 ml-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Item 3 -->
                    <div class="bg-white rounded-lg shadow-md p-6 flex items-center gap-6">
                        <div class="w-24 h-24 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                            <span class="text-gray-400 text-xs">Imagem</span>
                        </div>
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Protetor Solar FPS 60</h3>
                            <p class="text-sm text-gray-600 mb-2">Proteção UVA/UVB - 60g</p>
                            <p class="text-xl font-bold text-pink-600">R$ 69,90</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">−</span>
                            </button>
                            <span class="text-gray-900 font-semibold w-8 text-center">1</span>
                            <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-600">+</span>
                            </button>
                        </div>

                        <button class="text-red-500 hover:text-red-700 ml-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Cupom de Desconto -->
                <div class="bg-white rounded-lg shadow-md p-6 mt-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Cupom de Desconto</h3>
                    <div class="flex gap-3">
                        <input 
                            type="text" 
                            placeholder="Digite seu cupom"
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                        <button class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 transition font-semibold">
                            Aplicar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Resumo do Pedido -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Resumo do Pedido</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-700">
                            <span>Subtotal (4 itens)</span>
                            <span class="font-semibold">R$ 399,60</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Frete</span>
                            <span class="font-semibold text-green-600">Grátis</span>
                        </div>
                        <div class="flex justify-between text-gray-700">
                            <span>Desconto</span>
                            <span class="font-semibold text-green-600">- R$ 0,00</span>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-between text-xl font-bold text-gray-900">
                            <span>Total</span>
                            <span class="text-pink-600">R$ 399,60</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        @guest
                            <a href="{{ route('login') }}" class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition font-semibold text-center block">
                                Login para Continuar
                            </a>
                            <p class="text-sm text-gray-600 text-center">
                                Não tem conta? 
                                <a href="{{ route('register') }}" class="text-pink-600 hover:underline">Cadastre-se</a>
                            </p>
                        @else
                            <button class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition font-semibold">
                                Finalizar Compra
                            </button>
                        @endguest
                        
                        <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 transition font-semibold text-center block">
                            Continuar Comprando
                        </a>
                    </div>

                    <!-- Informações de Segurança -->
                    <div class="mt-6 pt-6 border-t">
                        <div class="space-y-3 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Compra 100% Segura</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                                </svg>
                                <span>Frete Grátis acima de R$ 199</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"/>
                                </svg>
                                <span>Troca em até 30 dias</span>
                            </div>
                        </div>
                    </div>

                    <!-- Formas de Pagamento -->
                    <div class="mt-6 pt-6 border-t">
                        <p class="text-sm text-gray-600 mb-3 font-semibold">Formas de Pagamento:</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs">💳 Cartão</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs">📱 PIX</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs">🏦 Boleto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produtos Recomendados -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Você também pode gostar</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Produto Recomendado 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Imagem</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Máscara Facial</h3>
                        <p class="text-pink-600 font-bold">R$ 59,90</p>
                        <button class="w-full mt-3 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition text-sm">
                            Adicionar
                        </button>
                    </div>
                </div>

                <!-- Produto Recomendado 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Imagem</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Tônico Facial</h3>
                        <p class="text-pink-600 font-bold">R$ 49,90</p>
                        <button class="w-full mt-3 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition text-sm">
                            Adicionar
                        </button>
                    </div>
                </div>

                <!-- Produto Recomendado 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Imagem</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Esfoliante</h3>
                        <p class="text-pink-600 font-bold">R$ 43,90</p>
                        <button class="w-full mt-3 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition text-sm">
                            Adicionar
                        </button>
                    </div>
                </div>

                <!-- Produto Recomendado 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">Imagem</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Creme para Olhos</h3>
                        <p class="text-pink-600 font-bold">R$ 79,90</p>
                        <button class="w-full mt-3 bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700 transition text-sm">
                            Adicionar
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection