{{-- resources/views/components/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Loja Estética' }}</title>

   
    @livewireStyles
</head>
<body>

    <header style="border-bottom:1px solid #e5e7eb;padding:12px 0;background:#fff;">
        <div style="max-width:960px;margin:0 auto;padding:0 16px;display:flex;align-items:center;justify-content:space-between;">
            <a href="{{ route('home') }}" style="font-weight:600;text-decoration:none;color:#111;">Loja Estética</a>

            <nav style="display:flex;gap:12px;align-items:center;">
                @auth
                    <a href="{{ route('dashboard') }}" style="text-decoration:none;color:#111;">Dashboard</a>

                    {{-- Logout via POST (recomendado) --}}
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none;border:none;color:#2563eb;cursor:pointer;text-decoration:underline;">
                            Sair
                        </button>
                    </form>

                    {{-- Se preferir Livewire, troque o form acima por:
                    <livewire:auth.logout-button />
                    --}}
                @else
                    <a href="{{ route('login') }}" style="text-decoration:none;color:#111;">Entrar</a>
                    <a href="{{ route('register') }}" style="color:#2563eb;text-decoration:underline;">Criar conta</a>
                @endauth
            </nav>
        </div>
    </header>

    <main style="max-width:960px;margin:0 auto;padding:16px;">
        {{ $slot }}
    </main>

    <footer style="margin-top:48px;padding:24px 0;text-align:center;font-size:12px;color:#6b7280;">
        &copy; {{ date('Y') }} Loja Estética — Todos os direitos reservados.
    </footer>

    @livewireScripts
</body>
</html>
