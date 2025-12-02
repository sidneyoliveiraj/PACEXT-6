@extends('layouts.app')

@section('title', $service->name)

@section('content')

<!-- Header -->
<div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4">{{ $service->name }}</h1>
        @if($service->category)
            <span class="inline-block bg-pink-100 text-pink-700 px-4 py-1 rounded-full text-sm font-semibold">
                {{ $service->category->name }}
            </span>
        @endif
    </div>
</div>

<!-- Conteúdo -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- Imagem -->
        <div class="rounded-lg overflow-hidden shadow-md bg-gray-200 h-96 flex items-center justify-center">
            @if($service->thumbnail)
                <img src="{{ $service->thumbnail_url }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
            @else
                <span class="text-gray-400 text-lg">Sem imagem disponível</span>
            @endif
        </div>

        <!-- Informações -->
        <div>

            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $service->name }}</h2>

            <!-- Preço e duração -->
            <div class="flex items-center gap-6 mb-6">
                <p class="text-4xl font-bold text-pink-600">
                    R$ {{ number_format($service->price, 2, ',', '.') }}
                </p>
                <p class="text-gray-600 text-lg">
                    ⏱ {{ $service->formatted_duration }}
                </p>
            </div>

            <!-- Avaliações -->
            @if($service->reviews_count > 0)
                <div class="flex items-center mb-6">
                    <div class="text-yellow-400 text-2xl">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= round($service->average_rating) ? '★' : '☆' }}
                        @endfor
                    </div>
                    <span class="text-gray-700 ml-3 text-lg">
                        {{ $service->reviews_count }} avaliações
                    </span>
                </div>
            @endif

            <!-- Descrição completa -->
            <p class="text-gray-700 leading-relaxed mb-8">
                {{ $service->description }}
            </p>

            <!-- Botões -->
            <div class="flex gap-4">
                <a href="#agendamento"
                    class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition font-semibold">
                    Agendar Consulta
                </a>

                <a href="{{ route('services.index') }}"
                    class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-200 transition font-semibold">
                    Voltar aos Serviços
                </a>
            </div>
        </div>
    </div>

    <!-- Seção de Agendamento -->
    <div id="agendamento" class="bg-gray-50 p-8 rounded-lg mt-16 shadow-sm">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Agende sua consulta</h3>
        <p class="text-gray-600 mb-6">
            Entre em contato conosco para marcar seu horário com uma de nossas especialistas.
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="https://wa.me/5547999999999" target="_blank"
                class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition font-semibold inline-flex items-center justify-center">
                <span class="mr-2">💬</span> WhatsApp
            </a>

            <a href="tel:4799999999"
                class="bg-pink-600 text-white px-8 py-3 rounded-lg hover:bg-pink-700 transition font-semibold inline-flex items-center justify-center">
                <span class="mr-2">📞</span> Ligar Agora
            </a>
        </div>
    </div>

</div>

@endsection
