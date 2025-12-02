<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Exibe a lista de serviços
     */
    public function index(Request $request)
    {
        $query = Service::with('category')
            ->where('is_active', true);

        // Filtro por categoria
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Ordenação
        switch ($request->get('sort', 'newest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'duration':
                $query->orderBy('duration', 'asc');
                break;
            default:
                $query->latest();
        }

        $services = $query->paginate(10);

        // Buscar categorias para o filtro
        $categories = Category::where('is_active', true)
            ->withCount('services')
            ->get();

        return view('services.index', compact('services', 'categories'));
    }

    /**
     * Exibe detalhes de um serviço específico
     */
    public function show($slug)
    {
        $service = Service::with(['category', 'reviews.user'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Serviços relacionados (mesma categoria)
        $relatedServices = Service::where('category_id', $service->category_id)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();

        // Calcular média de avaliações
        $averageRating = $service->reviews()
            ->where('is_approved', true)
            ->avg('rating');

        $reviewsCount = $service->reviews()
            ->where('is_approved', true)
            ->count();

        return view('services.show', compact(
            'service',
            'relatedServices',
            'averageRating',
            'reviewsCount'
        ));
    }
}