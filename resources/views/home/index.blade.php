@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-pink-500 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Beleza e Bem-Estar
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Tratamentos estéticos de excelência e produtos premium para sua pele
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="bg-white text-pink-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Ver Produtos
                </a>
                <a href="{{ route('services.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-pink-600 transition">
                    Nossos Serviços
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Produtos em Destaque -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Produtos em Destaque</h2>
            <p class="text-gray-600">Conheça nossa linha premium de skincare</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card Produto 1 -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">Imagem do Produto</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Sérum Facial</h3>
                    <p class="text-gray-600 mb-4">Sérum anti-idade com vitamina C</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-pink-600">R$ 149,90</span>
                        <a href="#" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition">
                            Ver Mais
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Produto 2 -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">Imagem do Produto</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Creme Hidratante</h3>
                    <p class="text-gray-600 mb-4">Hidratação intensa 24h</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-pink-600">R$ 89,90</span>
                        <a href="#" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition">
                            Ver Mais
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Produto 3 -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="h-64 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400">Imagem do Produto</span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Máscara Facial</h3>
                    <p class="text-gray-600 mb-4">Máscara de argila detox</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-pink-600">R$ 69,90</span>
                        <a href="#" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition">
                            Ver Mais
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="inline-block bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                Ver Todos os Produtos
            </a>
        </div>
    </div>
</section>

<!-- Serviços -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Nossos Serviços</h2>
            <p class="text-gray-600">Tratamentos estéticos personalizados</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Serviço 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">✨</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Limpeza de Pele</h3>
                <p class="text-gray-600 mb-4">Limpeza profunda e revitalização</p>
                <span class="text-pink-600 font-bold">A partir de R$ 120</span>
            </div>

            <!-- Serviço 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💆</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Massagem Facial</h3>
                <p class="text-gray-600 mb-4">Relaxamento e rejuvenescimento</p>
                <span class="text-pink-600 font-bold">A partir de R$ 90</span>
            </div>

            <!-- Serviço 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💉</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tratamento Anti-Idade</h3>
                <p class="text-gray-600 mb-4">Preenchimento e botox</p>
                <span class="text-pink-600 font-bold">A partir de R$ 300</span>
            </div>

            <!-- Serviço 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition text-center">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🌟</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Peeling Químico</h3>
                <p class="text-gray-600 mb-4">Renovação celular</p>
                <span class="text-pink-600 font-bold">A partir de R$ 200</span>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services.index') }}" class="inline-block bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                Ver Todos os Serviços
            </a>
        </div>
    </div>
</section>

<!-- Depoimentos -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">O Que Nossos Clientes Dizem</h2>
            <p class="text-gray-600">Avaliações reais de quem confia em nosso trabalho</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Depoimento 1 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-700 mb-4">"Excelente atendimento! Os produtos são de qualidade e os resultados são incríveis. Super recomendo!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                        <span class="text-pink-600 font-semibold">MS</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900">Maria Silva</p>
                        <p class="text-sm text-gray-600">Cliente há 2 anos</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 2 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-700 mb-4">"Ambiente acolhedor e profissionais muito competentes. Minha pele nunca esteve tão bonita!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                        <span class="text-pink-600 font-semibold">AP</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900">Ana Paula</p>
                        <p class="text-sm text-gray-600">Cliente há 1 ano</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 3 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400">★★★★★</div>
                </div>
                <p class="text-gray-700 mb-4">"Produtos excelentes com entrega rápida. O tratamento anti-idade superou todas as expectativas!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                        <span class="text-pink-600 font-semibold">JC</span>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-gray-900">Juliana Costa</p>
                        <p class="text-sm text-gray-600">Cliente há 6 meses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-16 bg-gradient-to-r from-pink-500 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Pronta para Transformar Sua Pele?</h2>
        <p class="text-xl mb-8 opacity-90">Agende uma avaliação gratuita com nossos especialistas</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @guest
                <a href="{{ route('register') }}" class="bg-white text-pink-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Criar Conta
                </a>
            @else
                <a href="{{ route('services.index') }}" class="bg-white text-pink-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Agendar Consulta
                </a>
            @endguest
            <a href="https://wa.me/5547999999999" target="_blank" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-pink-600 transition">
                WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection