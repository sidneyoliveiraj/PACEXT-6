<div class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
    <h1 class="text-2xl font-semibold mb-4">Criar conta</h1>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="register" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Nome</label>
            <input type="text" wire:model.defer="name" class="w-full border rounded px-3 py-2" autocomplete="name">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">E-mail</label>
            <input type="email" wire:model.defer="email" class="w-full border rounded px-3 py-2" autocomplete="email">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Senha</label>
            <input type="password" wire:model.defer="password" class="w-full border rounded px-3 py-2" autocomplete="new-password">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Confirmar senha</label>
            <input type="password" wire:model.defer="password_confirmation" class="w-full border rounded px-3 py-2" autocomplete="new-password">
        </div>

        <button type="submit" class="w-full bg-black text-white rounded py-2">Cadastrar</button>

        <p class="text-sm mt-3">
            Já tem conta?
            <a href="{{ route('login') }}" class="underline">Entrar</a>
        </p>
    </form>
</div>
