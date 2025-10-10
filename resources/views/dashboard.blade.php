<x-layouts.app title="Dashboard">
    <div class="py-10">
        <h2 class="text-2xl font-semibold mb-2">Olá, {{ auth()->user()->name }}!</h2>
        <p class="text-gray-600">Este é o seu painel. Em breve: Perfil, Pedidos e Catálogo.</p>
    </div>
</x-layouts.app>
