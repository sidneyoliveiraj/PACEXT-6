<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Clínica de Estética') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navegação -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-pink-600">
                        Clínica Estética
                    </a>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-pink-600 font-medium transition">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-pink-600 font-medium transition">
                        Produtos
                    </a>
                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-pink-600 font-medium transition">
                        Serviços
                    </a>
                    <a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">
                        Sobre
                    </a>
                    <a href="#" class="text-gray-700 hover:text-pink-600 font-medium transition">
                        Contato
                    </a>
                </div>

                <!-- Menu Ações -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Carrinho -->
                    <a href="{{ route('cart.index') }}" class="relative text-gray-700 hover:text-pink-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-pink-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                            0
                        </span>
                    </a>

                    @guest
                        <!-- Usuário não logado -->
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-600 font-medium transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition font-medium">
                            Cadastrar
                        </a>
                    @else
                        <!-- Usuário logado -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-pink-600 transition">
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Meu Perfil
                                </a>
                                <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Meus Pedidos
                                </a>
                                @if(Auth::user()->isAdmin())
                                    <hr class="my-2">
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-pink-600 hover:bg-gray-100 font-medium">
                                        Admin Dashboard
                                    </a>
                                @endif
                                <hr class="my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                        Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Menu Mobile (Hamburguer) -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-pink-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-3">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Home</a>
                <a href="{{ route('products.index') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Produtos</a>
                <a href="{{ route('services.index') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Serviços</a>
                <a href="#" class="block text-gray-700 hover:text-pink-600 font-medium">Sobre</a>
                <a href="#" class="block text-gray-700 hover:text-pink-600 font-medium">Contato</a>
                <hr>
                @guest
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Cadastrar</a>
                @else
                    <a href="{{ route('profile') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Meu Perfil</a>
                    <a href="{{ route('orders.index') }}" class="block text-gray-700 hover:text-pink-600 font-medium">Meus Pedidos</a>
                    @if(Auth::user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block text-pink-600 font-medium">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-red-600 font-medium">Sair</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Mensagens Flash -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 m-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 p-4 m-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Sobre -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Clínica Estética</h3>
                    <p class="text-gray-400">
                        Beleza e bem-estar com excelência e profissionalismo.
                    </p>
                </div>

                <!-- Links Rápidos -->
                <div>
                    <h4 class="font-semibold mb-4">Links Rápidos</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('products.index') }}" class="hover:text-white">Produtos</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white">Serviços</a></li>
                        <li><a href="#" class="hover:text-white">Sobre Nós</a></li>
                        <li><a href="#" class="hover:text-white">Contato</a></li>
                    </ul>
                </div>

                <!-- Contato -->
                <div>
                    <h4 class="font-semibold mb-4">Contato</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 Joinville, SC</li>
                        <li>📞 (47) 99999-9999</li>
                        <li>✉️ contato@clinica.com</li>
                    </ul>
                </div>

                <!-- Redes Sociais -->
                <div>
                    <h4 class="font-semibold mb-4">Redes Sociais</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-2xl">📱</a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl">📘</a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl">💬</a>
                    </div>
                </div>
            </div>

            <hr class="my-8 border-gray-800">

            <div class="text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} Clínica de Estética. Todos os direitos reservados.</p>
                <p class="mt-2">
                    <a href="/termos" class="hover:text-white">Termos de Uso</a> |
                    <a href="/privacidade" class="hover:text-white">Política de Privacidade</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Alpine.js para interatividade -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Script para menu mobile -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>