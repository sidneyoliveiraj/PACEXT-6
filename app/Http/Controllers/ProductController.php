<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Exibe a lista de produtos
     */
    public function index(Request $request)
    {
        $query = Product::with('category')
            ->where('is_active', true);

        // Filtro por categoria
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Busca por nome
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Ordenação
        switch ($request->get('sort', 'newest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
        }

        // Paginação
        $products = $query->paginate(12);

        // Buscar categorias para o filtro
        $categories = Category::where('is_active', true)
            ->withCount('products')
            ->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Exibe detalhes de um produto específico
     */
    public function show($slug)
    {
        $product = Product::with(['category', 'images', 'reviews.user'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Produtos relacionados (mesma categoria)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        // Calcular média de avaliações
        $averageRating = $product->reviews()
            ->where('is_approved', true)
            ->avg('rating');

        $reviewsCount = $product->reviews()
            ->where('is_approved', true)
            ->count();

        return view('products.show', compact(
            'product',
            'relatedProducts',
            'averageRating',
            'reviewsCount'
        ));
    }
}