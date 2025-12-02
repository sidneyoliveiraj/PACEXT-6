@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Vendas -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Vendas do Mês</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">R$ 45.890</p>
                <p class="text-sm text-green-600 mt-2">↑ 12% vs mês anterior</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Pedidos -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Pedidos</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">248</p>
                <p class="text-sm text-blue-600 mt-2">5 pendentes</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Clientes -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Clientes</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">1.234</p>
                <p class="text-sm text-purple-600 mt-2">+45 novos</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Produtos -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Produtos</p>
                <p class="text-3xl font-bold text-gray-900 mt-2">156</p>
                <p class="text-sm text-orange-600 mt-2">12 em falta</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Gráficos -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Gráfico de Vendas -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Vendas dos Últimos 7 Dias</h3>
        <canvas id="salesChart"></canvas>
    </div>

    <!-- Gráfico de Categorias -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Vendas por Categoria</h3>
        <canvas id="categoryChart"></canvas>
    </div>
</div>

<!-- Pedidos Recentes e Produtos em Falta -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Pedidos Recentes -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Pedidos Recentes</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-pink-600 hover:text-pink-700 text-sm font-medium">
                Ver Todos →
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Pedido</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Cliente</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Valor</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">#1234</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Maria Silva</td>
                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">R$ 289,90</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                                Pendente
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">#1233</td>
                        <td class="px-4 py-3 text-sm text-gray-600">João Santos</td>
                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">R$ 459,80</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                Processando
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">#1232</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Ana Costa</td>
                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">R$ 189,50</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                Completo
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">#1231</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Pedro Lima</td>
                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">R$ 329,00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">
                                Enviado
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">#1230</td>
                        <td class="px-4 py-3 text-sm text-gray-600">Julia Mendes</td>
                        <td class="px-4 py-3 text-sm text-gray-900 font-semibold">R$ 149,90</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                Completo
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Produtos em Falta -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Estoque Baixo</h3>
            <a href="{{ route('admin.products.index') }}" class="text-pink-600 hover:text-pink-700 text-sm font-medium">
                Ver Todos →
            </a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center gap-4 p-3 bg-red-50 rounded-lg">
                <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900">Sérum Anti-Idade</p>
                    <p class="text-sm text-gray-600">SKU: SER-001</p>
                </div>
                <div class="text-right">
                    <p class="text-red-600 font-bold">2 un</p>
                    <p class="text-xs text-gray-500">Crítico</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-3 bg-orange-50 rounded-lg">
                <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900">Creme Hidratante</p>
                    <p class="text-sm text-gray-600">SKU: CRE-005</p>
                </div>
                <div class="text-right">
                    <p class="text-orange-600 font-bold">8 un</p>
                    <p class="text-xs text-gray-500">Baixo</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-3 bg-orange-50 rounded-lg">
                <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900">Máscara Facial</p>
                    <p class="text-sm text-gray-600">SKU: MAS-012</p>
                </div>
                <div class="text-right">
                    <p class="text-orange-600 font-bold">5 un</p>
                    <p class="text-xs text-gray-500">Baixo</p>
                </div>
            </div>

            <div class="flex items-center gap-4 p-3 bg-yellow-50 rounded-lg">
                <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0"></div>
                <div class="flex-1">
                    <p class="font-medium text-gray-900">Protetor Solar FPS 60</p>
                    <p class="text-sm text-gray-600">SKU: PRO-018</p>
                </div>
                <div class="text-right">
                    <p class="text-yellow-600 font-bold">12 un</p>
                    <p class="text-xs text-gray-500">Atenção</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Gráfico de Vendas
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            datasets: [{
                label: 'Vendas (R$)',
                data: [1200, 1900, 3000, 2500, 3200, 2800, 3500],
                borderColor: 'rgb(219, 39, 119)',
                backgroundColor: 'rgba(219, 39, 119, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'R$ ' + value;
                        }
                    }
                }
            }
        }
    });

    // Gráfico de Categorias
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Limpeza', 'Hidratação', 'Anti-Idade', 'Proteção', 'Outros'],
            datasets: [{
                data: [30, 25, 20, 15, 10],
                backgroundColor: [
                    'rgb(219, 39, 119)',
                    'rgb(147, 51, 234)',
                    'rgb(59, 130, 246)',
                    'rgb(16, 185, 129)',
                    'rgb(249, 115, 22)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush