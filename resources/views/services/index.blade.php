@extends('layouts.app')

@section('title', 'Serviços')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4">Nossos Serviços</h1>
        <p class="text-xl opacity-90">Tratamentos estéticos personalizados para realçar sua beleza</p>
    </div>
</div>

<!-- Filtros -->
<div class="bg-white border-b sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <form method="GET" action="{{ route('services.index') }}" class="flex flex-wrap gap-3">
            <button type="submit" name="category" value="" class="px-4 py-2 {{ !request('category') ? 'bg-pink-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg font-medium">
                Todos
            </button>
            @foreach($categories as $category)
                <button type="submit" name="category" value="{{ $category->id }}" class="px-4 py-2 {{ request('category') == $category->id ? 'bg-pink-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg font-medium">
                    {{ $category->name }} ({{ $category->services_count }})
                </button>
            @endforeach
        </form>
    </div>
</div>

<!-- Lista de Serviços -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($services->count() > 0)
        <div class="mb-6">
            <p class="text-gray-600">
                Mostrando {{ $services->firstItem() }} - {{ $services->lastItem() }} de {{ $services->total() }} serviços
            </p>
        </div>

        <div class="space-y-8">
            @foreach($services as $service)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <div class="md:flex">
                        <div class="md:w-1/3 h-64 md:h-auto bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($service->thumbnail)
                                <img src="{{ $service->thumbnail_url }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-400">{{ $service->name }}</span>
                            @endif
                        </div>
                        <div class="p-6 md:w-2/3">
                            <div class="flex items-start justify-between">
                                <div>
                                    @if($service->category)
                                        <span class="inline-block px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm font-semibold mb-2">
                                            {{ $service->category->name }}
                                        </span>
                                    @endif
                                    <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $service->name }}</h2>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-bold text-pink-600">R$ {{ number_format($service->price, 2, ',', '.') }}</p>
                                    <p class="text-sm text-gray-600">{{ $service->formatted_duration }}</p>
                                </div>
                            </div>
                            
                            <p class="text-gray-700 mb-4">{{ $service->short_description }}</p>

                            @if($service->reviews_count > 0)
                                <div class="flex items-center mb-4">
                                    <div class="text-yellow-400 text-lg">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= round($service->average_rating))
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-gray-600 ml-2">({{ $service->reviews_count }} avaliações)</span>
                                </div>
                            @endif

                            <div class="flex gap-4">
                                <a href="{{ route('services.show', $service->slug) }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-200 transition font-semibold">
                                    Ver Detalhes
                                </a>
                                <button class="bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition font-semibold">
                                    Agendar Consulta
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="mt-12">
            {{ $services->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <div class="text-6xl mb-4">💆</div>
            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Nenhum serviço encontrado</h3>
            <p class="text-gray-600 mb-6">Tente selecionar outra categoria</p>
            <a href="{{ route('services.index') }}" class="inline-block bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition">
                Ver Todos os Serviços
            </a>
        </div>
    @endif

<!-- CTA Section -->
<div class="bg-gray-50 py-16 mt-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Não encontrou o que procura?</h2>
        <p class="text-lg text-gray-600 mb-8">
            Entre em contato conosco e faremos uma avaliação personalizada para suas necessidades
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/5547999999999" target="_blank" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition font-semibold inline-flex items-center justify-center">
                <span class="mr-2">💬</span> WhatsApp
            </a>
            <a href="tel:4799999999" class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition font-semibold inline-flex items-center justify-center">
                <span class="mr-2">📞</span> Ligar Agora
            </a>
        </div>
    </div>
</div>
@endsection