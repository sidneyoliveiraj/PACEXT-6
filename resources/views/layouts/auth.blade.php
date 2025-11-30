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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Logo da Clínica -->
    <div class="absolute top-8 left-8">
        <a href="/" class="flex items-center">
            <span class="text-2xl font-bold text-pink-600">Clínica Estética</span>
        </a>
    </div>

    <!-- Conteúdo Principal -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="fixed bottom-0 w-full py-4 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Clínica de Estética. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>