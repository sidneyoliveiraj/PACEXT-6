<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index(Request $request)
    {
        $query = Service::with('category');

        // Filtro por busca
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        // Filtro por categoria
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filtro por status
        if ($request->has('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $services = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Gerar slug
        $validated['slug'] = Str::slug($validated['name']);

        // Upload da imagem
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('services', 'public');
        }

        // Criar serviço
        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Serviço criado com sucesso!');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        $service->load('category', 'reviews');
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Atualizar slug se o nome mudou
        if ($validated['name'] !== $service->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Upload nova imagem
        if ($request->hasFile('thumbnail')) {
            // Deletar imagem antiga
            if ($service->thumbnail) {
                Storage::disk('public')->delete($service->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('services', 'public');
        }

        // Atualizar serviço
        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Verificar se o serviço tem pedidos
        if ($service->orderItems()->exists()) {
            return redirect()
                ->route('admin.services.index')
                ->with('error', 'Não é possível excluir um serviço que possui pedidos associados.');
        }

        // Deletar imagem
        if ($service->thumbnail) {
            Storage::disk('public')->delete($service->thumbnail);
        }

        // Deletar serviço
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Serviço excluído com sucesso!');
    }

    /**
     * Toggle service active status.
     */
    public function toggleStatus(Service $service)
    {
        $service->update([
            'is_active' => !$service->is_active
        ]);

        $status = $service->is_active ? 'ativado' : 'desativado';

        return redirect()
            ->route('admin.services.index')
            ->with('success', "Serviço {$status} com sucesso!");
    }

    /**
     * Get service statistics.
     */
    public function statistics(Service $service)
    {
        $stats = [
            'total_bookings' => $service->orderItems()->count(),
            'total_revenue' => $service->orderItems()->sum('price'),
            'average_rating' => $service->reviews()->avg('rating'),
            'total_reviews' => $service->reviews()->count(),
        ];

        return response()->json($stats);
    }
}